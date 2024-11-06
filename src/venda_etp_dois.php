<?php
	require_once("verifica.php");
	include_once("config.php");
	include_once("cabec.php");


	$conexao = db_connect();

	//estamos verificando se a pagina foi acessada atraves de um metodo POST
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		// Verificar se foi envaido ao menos um valor
		if (!empty($_POST['edtNome'])) { 
			?>
			<p>&nbsp;</p>

			<h2 align="center"><?php echo $lng['realizandoVenda']; ?></h2>

			<p>&nbsp;</p>

			<?php
			// como estamos passando mais que um valor usando uma array, para cada valor presente vamos percorre pelo foreach
			foreach ($_POST['edtNome'] as $produto) {
				$sql = "select prod_quantidade, prod_preco_venda, prod_nome, prod_und_medida
				from produtos where prod_nome = :nome";
				
				$comando = $conexao->prepare($sql);

				$comando->bindParam(':nome', 	$produto);

				$comando->execute();

				$dados = $comando->fetchAll(PDO::FETCH_OBJ);
				foreach ($dados as $linhas) {
					// Imprimir as informações do produto
				?>
					<form class="form-inline row justify-content-center col-lg-12" action="venda_etp_tres.php" method="post">

						<div class="form-group row my-2">
							<label for="edtNome" class="col-sm-2 col-form-label text-end"><?php echo $lng['nome']; ?>: &nbsp;<h11>*</h11>&nbsp;</label>
							<div class="col-sm-7">
								<input type="text" class="form-control" id="edtNome" name="edtNome[]" value="<?php echo $linhas->prod_nome ?>" readonly>
							</div>
						</div>

						<div class="form-group row my-2">
							<label for="edtQuantidade" class="col-sm-2 col-form-label text-end"><?php echo $lng['quantidadeUnd']; ?>: &nbsp;<h11>*</h11>&nbsp;</label>
							<div class="col-sm-7">
								<input type="text" class="form-control" id="edtQuantidade" name="edtQuantidade[]" placeholder="<?php echo $lng['quantMax'] . $linhas->prod_quantidade . " " . $linhas->prod_und_medida ?>">
							</div>
						</div>

						<div class="form-group row my-2">
							<label for="edtPreco" class="col-sm-2 col-form-label text-end"><?php echo $lng['precoUnd']; ?>: &nbsp;<h11>*</h11>&nbsp;</label>
							<div class="col-sm-7">
								<input type="text" class="form-control" id="edtPreco" name="edtPreco[]" value="<?php echo $linhas->prod_preco_venda; ?>" readonly>
							</div>
						</div>

						<p>&nbsp;</p>	

					<?php
				}
			}?>
					<div class="col-md-12 my-3">
						<div class="form-group row">

							<div class="col-md-6 text-end">
								<button type="button" class="btn btn-dark" onClick="window.open('venda_etp_um.php', '_self')"><?php echo $lng['voltar']; ?></button>
							</div>

							<div class="col-md-6">
								<button type="submit" class="btn btn-dark"><?php echo $lng['seguinte']; ?></button>
							</div>

						</div>
					</div>
					
				</form>
		<?php 
		} else {
			echo "Nenhum produto selecionado.";
		}
	} else {
		header("location: venda_etp_um");
	}

?>
