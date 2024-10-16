<?php
	require_once("verifica.php");

	include_once("cabec.php");
	
	include_once("config.php");

    $conexao = db_connect();

	$sql = "select usuario.usu_codigo, usuario.usu_mail, usuario.usu_nome, usuario.usu_status, usuario.usu_tipo
			from usuario 
			order by usuario.usu_nome ";

	$comando = $conexao->prepare($sql);

	$comando->execute();
			
	$dados = $comando->fetchAll(PDO::FETCH_OBJ);
?>

	<p>&nbsp;</p>

	<h2 align="center" class="text-dark"><?php echo $lng['cadastroUsu']; ?></h2>

	<p>&nbsp;</p>

	<div class="row col-lg-12 justify-content-start">
		<div class="col-lg-1 col-sm-1">&nbsp;</div>
		
		<form id="formNovo" name="formNovo" action="usuarioCad.php" method="post" class="form col-lg-3 col-sm-10"> <!-- Modifica as classes de coluna para ajustar o tamanho do formulário -->
			<input type="hidden" name="op" value="I" />
			<input type="hidden" name="codigo" value="0" />

			<button type="button" class="btn btn-dark" onClick="formNovo.submit();"><?php echo $lng['novoCadastro'];?></button>
		</form>
	</div>

	<p>&nbsp;</p>

	<div class="container">
		<table id="dados" class="table table-bordered table-hover col-lg-10 col-sm-12" align="center" border=1>
			<thead class="bg-dark text-light">
				<tr>
					<th class="text-center"><?php echo $lng['codigo'];?></th>
					<th class="text-center"><?php echo $lng['nome'];?></th>
					<th class="text-center"><?php echo $lng['email'];?></th>
					<th class="text-center"><?php echo $lng['status'];?></th>
					<th class="text-center"><?php echo $lng['tipo'];?></th>
					<th class="text-center"><?php echo $lng['opcoes'];?></th>
				</tr>
			</thead>
			<tbody>
				<?php
					foreach( $dados as $linha )
					{				
				?>
				<tr>
					<td align="center"><?php echo htmlspecialchars($linha->usu_codigo); ?></td>
					<td><?php echo htmlspecialchars($linha->usu_nome); ?></td>
					<td align="center"><?php echo htmlspecialchars( $linha->usu_mail ); ?></td>
					<td align="center"><?php echo htmlspecialchars( $linha->usu_status ); ?></td>
					<td align="center">
						<?php 
							if( $linha->usu_tipo == 'M' ) { echo 'Master'; }
							elseif( $linha->usu_tipo == 'A' ) { echo 'Admin'; }
							elseif( $linha->usu_tipo == 'O' ) { echo 'Operador'; }
						?>
					</td>
					
					<td>
						<div class="row col-lg-12 justify-content-center">
							<form id="<?php echo 'formVer' . $linha->usu_codigo; ?>" name="<?php echo 'formVer' . $linha->usu_codigo; ?>" action="usuarioCad.php" method="post" class="form col-lg-1">
								<input type="hidden" name="op" value="C" />
								<input type="hidden" name="codigo" value="<?php echo $linha->usu_codigo; ?>" />

								<a title="Visualizar" href="javascript:void(0);" onClick="<?php echo 'formVer' . $linha->usu_codigo; ?>.submit();" >
									<i class="bi-display" style="font-size: 1.5rem; color: black;"></i>
								</a>
							</form>
							
							&nbsp;&nbsp;&nbsp;
							<form id="<?php echo 'formAlt' . $linha->usu_codigo; ?>" name="<?php echo 'formAlt' . $linha->usu_codigo; ?>" action="usuarioCad.php" method="post" class="form col-lg-1">
								<input type="hidden" name="op" value="A" />
								<input type="hidden" name="codigo" value="<?php echo $linha->usu_codigo; ?>" />

								<a title="Alterar" href="javascript:void(0);" onClick="<?php echo 'formAlt' . $linha->usu_codigo; ?>.submit();" >
									<i class="bi-pencil" style="font-size: 1.5rem; color: black;"></i>
								</a>
							</form> 
						
						</div>
					</td>
				</tr>
				<?php
					}
				?>
			</tbody>
		</table>
	</div>

	<link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" />
	<script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
	<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" />
	<script>
		idioma = "<?php echo $_COOKIE['idioma']; ?>";
		idioma = idioma.replace('_', '-');
		
		$(document).ready(function () {
			$('#dados').DataTable({
				language: {
					url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/' + idioma.trim() + '.json',
					decimal: ',',
            		thousands: '.',
				},
			});
		});
		
	</script>

	<p>&nbsp;</p>
	<p>&nbsp;</p>


<?php
	include_once("rodape.php");
?>