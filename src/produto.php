<?php
	require_once("verifica.php");

	include_once("cabec.php");
	
	include_once("config.php");

    $conexao = db_connect();

	$sql = "select produtos.codigo_produto, produtos.prod_nome, produtos.prod_fornecedor, produtos.prod_marca, produtos.prod_categoria,
	 		produtos.prod_und_medida, produtos.prod_quantidade, produtos.prod_preco_compra, produtos.prod_preco_venda, produtos.prod_data_cad,
			produtos.prod_data_atualizacao
			from produtos 
			order by produtos.prod_nome ";

	$comando = $conexao->prepare($sql);

	$comando->execute();
			
	$dados = $comando->fetchAll(PDO::FETCH_OBJ);
?>

	<p>&nbsp;</p>

	<h2 align="center" class="text-dark"><?php echo $lng['estoqueProd'];?></h2>

	<p>&nbsp;</p>

	<div class="row col-lg-12 justify-content-start">
		<div class="col-lg-1 col-sm-1">&nbsp;</div>
		
		<form id="formNovo" name="formNovo" action="ProdutoCad.php" method="post" class="form col-lg-3 col-sm-10"> <!-- Modifica as classes de coluna para ajustar o tamanho do formulário -->
			<input type="hidden" name="op" value="I" />
			<input type="hidden" name="codigo" value="0" />

			<button type="button" class="btn btn-dark" onClick="formNovo.submit();"><?php echo $lng['novoProd'];?></button>
		</form>
	</div>

	<p>&nbsp;</p>


	<div class="container">
		<table id="dados" class="table table-bordered table-hover col-lg-10 col-sm-12" align="center" border=1>
			<thead class="bg-dark text-light">
				<tr>
					<!-- <th class="text-center">< ?php echo $lng['codigo'];?></th> -->
					<th class="text-center"><?php echo $lng['nome'];?></th>
					<th class="text-center"><?php echo $lng['fornecedor'];?></th>
					<th class="text-center"><?php echo $lng['marca'];?></th>
					<th class="text-center"><?php echo $lng['categoria'];?></th>
					<th class="text-center"><?php echo $lng['quantidade'];?></th>
					<th class="text-center"><?php echo $lng['undMedidaAbrev'];?></th>
					<!-- <th class="text-center">< ?php echo $lng['precoCompra'];?></th> -->
					<th class="text-center"><?php echo $lng['precoVenda'];?></th>
					<th class="text-center"><?php echo $lng['opcoes'];?></th>
				</tr>
			</thead>
			<tbody>
				<?php
					foreach( $dados as $linha )
					{				
				?>
				<tr>
					<!-- <td align="center">< ?php echo htmlspecialchars($linha->codigo_produto); ?></td> -->
					<td align="center"><?php echo htmlspecialchars($linha->prod_nome); ?></td>
					<td align="center"><?php echo htmlspecialchars( $linha->prod_fornecedor ); ?></td>
					<td align="center"><?php echo htmlspecialchars( $linha->prod_marca ); ?></td>
					<td align="center"><?php echo htmlspecialchars( $linha->prod_categoria ); ?></td>
					<td align="center"><?php echo htmlspecialchars( $linha->prod_quantidade ); ?></td>
					<td align="center"><?php echo htmlspecialchars( $linha->prod_und_medida ); ?></td>
					<!-- <td align="center">< ?php echo htmlspecialchars( $linha->prod_preco_compra ); ?></td> -->
					<td align="center"><?php echo htmlspecialchars( $linha->prod_preco_venda ); ?></td>

					<td>
						<div class="row col-lg-12 justify-content-center">
							<form id="<?php echo 'formVer' . $linha->codigo_produto; ?>" name="<?php echo 'formVer' . $linha->codigo_produto; ?>" action="ProdutoCad.php" method="post" class="form col-lg-1">
								<input type="hidden" name="op" value="C" />
								<input type="hidden" name="codigo" value="<?php echo $linha->codigo_produto; ?>" />

								<a title="Visualizar" href="javascript:void(0);" onClick="<?php echo 'formVer' . $linha->codigo_produto; ?>.submit();" >
									<i class="bi-display" style="font-size: 1.5rem; color: black;"></i>
								</a>
							</form>
							
							&nbsp;&nbsp;&nbsp;
							<form id="<?php echo 'formAlt' . $linha->codigo_produto; ?>" name="<?php echo 'formAlt' . $linha->codigo_produto; ?>" action="ProdutoCad.php" method="post" class="form col-lg-1">
								<input type="hidden" name="op" value="A" />
								<input type="hidden" name="codigo" value="<?php echo $linha->codigo_produto; ?>" />

								<a title="Alterar" href="javascript:void(0);" onClick="<?php echo 'formAlt' . $linha->codigo_produto; ?>.submit();" >
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