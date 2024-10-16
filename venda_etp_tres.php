<?php
	require_once("verifica.php");
	include_once("config.php");
	include_once("cabec.php");

	//verificando se a pagina foi acessada atraves de um metodo post
	if ($_SERVER['REQUEST_METHOD'] == 'POST') { ?>

		<p>&nbsp;</p>

		<h2 align="center"><?php echo $lng['finalizandoVenda']; ?></h2>

		<p>&nbsp;</p>

		<?php
		// Obtendo os arrays enviados
		$produtos = $_POST['edtNome'];
		$quantidades = $_POST['edtQuantidade'];
		$precos = $_POST['edtPreco'];
		$total_venda = 0;
	
		// "count" conta quantos valores tem em cada array, estamos verificando se todos estão de acordo
		if (count($produtos) == count($quantidades) && count($produtos) == count($precos)) {
	
			// Loop através dos índices dos arrays
			for ($i = 0; $i < count($produtos); $i++) {
	
				// Obtendo os valores dos índices atuais
				$produto = $produtos[$i];
				$quantidade = $quantidades[$i];
				$preco = $precos[$i];

				//calculando o o valor das vendas
				$total_produto = $quantidade * $preco;

				$total_venda += $total_produto;
				?>

				<form class="form-inline row justify-content-center col-lg-12" action="venda_insert_venda.php" method="post">

				<!-- <p>< ?php echo $lng['produto'] . $i+1 ?></p> -->

				<div class="form-group row my-2">
					<label for="edtNome" class="col-sm-2 col-form-label text-end"><?php echo $lng['nome']; ?>: &nbsp;<h11>*</h11>&nbsp;</label>
					<div class="col-sm-7">
						<input type="text" class="form-control" id="edtNome" name="edtNome[]" value="<?php echo $produto ?>" readonly>
					</div>
				</div>

				<div class="form-group row my-2">
					<label for="edtQuantidade" class="col-sm-2 col-form-label text-end"><?php echo $lng['quantidadeUnd']; ?>: &nbsp;<h11>*</h11>&nbsp;</label>
					<div class="col-sm-7">
						<input type="text" class="form-control" id="edtQuantidade" name="edtQuantidade[]" value="<?php echo $quantidade ?>" readonly>
					</div>
				</div>

				<div class="form-group row my-2">
					<label for="edtPreco" class="col-sm-2 col-form-label text-end"><?php echo $lng['preco']; ?>: &nbsp;<h11>*</h11>&nbsp;</label>
					<div class="col-sm-7">
						<input type="text" class="form-control" id="edtPreco" name="edtPreco[]" value="<?php echo $total_produto; ?>" readonly>
					</div>
				</div>

				<p>&nbsp;</p>	

			<?php
			//fechando for
			}
			?>
				<!-- adiciona uma linha para separar -->
				<hr style="width: 80%; height: 1px; background-color: black;">

				<p>&nbsp;</p>	

				<div class="form-group row my-2">
					<label for="edtTotal" class="col-sm-2 col-form-label font-bold text-end"><?php echo $lng['totalVenda']; ?>: &nbsp;<h11>*</h11>&nbsp;</label>
					<div class="col-sm-7">
						<input type="text" class="form-control" id="edtTotal" name="edtTotal" value="<?php echo $total_venda; ?>" readonly>
					</div>
				</div>

				<div class="form-group row my-2">
					<label for="edtFormaPag" class="col-sm-2 col-form-label font-bold text-end"><?php echo $lng['formaPagamento']; ?>: &nbsp;<h11>*</h11>&nbsp;</label>
					<div class="col-sm-7">
						<select name="edtFormaPag" id="edtFormaPag" class="form-control">
							<option value="dinehiro"><?php echo $lng['dinheiro']; ?></option>
							<option value="credito"><?php echo $lng['credito']; ?></option>
							<option value="debito"><?php echo $lng['debito']; ?></option>
							<option value="pix"><?php echo $lng['pix']; ?></option>
						</select>
					</div>
				</div>

				<div class="form-group row my-2">
					<label for="edtPagamento" class="col-sm-2 col-form-label font-bold text-end"><?php echo $lng['valorPago']; ?>: &nbsp;<h11>*</h11>&nbsp;</label>
					<div class="col-sm-7">
						<input type="text" class="form-control" id="edtPagamento" name="edtPagamento" value="<?php echo $total_venda; ?>">
					</div>
				</div>

				<div class="form-group row my-2">
					<label for="edtTroco" class="col-sm-2 col-form-label font-bold text-end"><?php echo $lng['troco']; ?>: &nbsp;<h11>*</h11>&nbsp;</label>
					<div class="col-sm-7">
						<input type="text" class="form-control" id="edtTroco" name="edtTroco" placeholder="<?php echo $lng['quantPaga']; ?>">
					</div>
				</div>

				<div class="col-md-12 my-3">
						<div class="form-group row">

							<div class="col-md-6 text-end">
								<button type="button" class="btn btn-dark" onClick="window.open('venda_etp_um.php', '_self')"><?php echo $lng['voltar']; ?></button>
							</div>

							<div class="col-md-6">
								<button type="submit" class="btn btn-dark"><?php echo $lng['finalizar']; ?></button>
							</div>

						</div>
					</div>
					
				</form>

		<?php
		//fechando o segundo if
		}
		//else do segundo if
		else {
			echo "Erro: o número de produtos, quantidades e preços não coincide.";
		}
		//else primeiro if
		
		//fechando o primeiro if
	}
	else {
		header("Location: venda_etp_um.php");
		exit;
	}
	
?>
		<p>&nbsp;</p>

		<p>&nbsp;</p>
