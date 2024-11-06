<?php
	require_once("verifica.php");

	$data = $_REQUEST;

	include_once("config.php");

	$conexao = db_connect();

	extract($data);

	if ($op != "I") {
        $sql = "SELECT codigo_produto, prod_nome, prod_fornecedor, prod_marca, prod_categoria, prod_und_medida,
				prod_quantidade, prod_preco_compra, prod_preco_venda, prod_data_cad, prod_data_atualizacao
                FROM produtos
                WHERE codigo_produto = :codigo";

        $comando = $conexao->prepare($sql);

        $comando->bindParam(':codigo', $codigo);

        $comando->execute();

        $dados = $comando->fetch(PDO::FETCH_OBJ);
    }

?>

<?php include_once("cabec.php"); ?>

	<p>&nbsp;</p>

	<h2 align="center"><?php echo $lng['dadosProd']; ?></h2>

	
	<form class="form-inline row justify-content-center col-lg-12" action="prodGrava.php" method="post">
	<input type="hidden" name="edtCodigo" value="<?php if ($op != "I") { echo $dados->codigo_produto; } else { echo "0"; } ?>" />
    <input type="hidden" name="op" value="<?php echo $op; ?>" />
		
		<div class="form-group col-sm-12 col-lg-10">
			<div class="control-label col-sm-11">
				<p class="help-block" align="right"><h11>*</h11> <?php echo $lng['campoObrigatorio']; ?> </p>
			</div>
		</div>
		
		<div class="form-group row my-2">
			<label for="prodNome" class="col-sm-2 col-form-label text-end"><?php echo $lng['produto']; ?>: &nbsp;<h11>*</h11>&nbsp;</label>
			<div class="col-sm-7">
				<input type="text" class="form-control" id="prodNome" name="prodNome" value="<?php if ($op != "I") { echo $dados->prod_nome; } ?>" <?php if ($op == "C") echo "readonly" ?> placeholder="<?php echo $lng['nomeProduto']; ?>">
			</div>
	  	</div>	
		

		<div class="form-group row my-2">
			<label for="prodFornecedor" class="col-sm-2 col-form-label text-end"><?php echo $lng['fornecedor']; ?>: &nbsp;<h11>*</h11>&nbsp;</label>
			<div class="col-sm-7">
				<input type="text" class="form-control" id="prodFornecedor" name="prodFornecedor" placeholder="<?php echo $lng['fornecedorProduto']; ?>" value="<?php if ($op != "I") { echo $dados->prod_fornecedor; } ?>" <?php if ($op == "C") echo "readonly" ?>>
			</div>
	  	</div>

		<div class="form-group row my-2">
			<label for="prodMarca" class="col-sm-2 col-form-label text-end"><?php echo $lng['marca']; ?>: &nbsp;<h11>*</h11>&nbsp;</label>
			<div class="col-sm-7">
				<input type="text" class="form-control" id="prodMarca" name="prodMarca" placeholder="<?php echo $lng['marcaProduto']; ?>" value="<?php if ($op != "I") { echo $dados->prod_marca; } ?>" <?php if ($op == "C") echo "readonly" ?>>
			</div>
	  	</div>

		<div class="form-group row my-2">
			<label for="prodCategoria" class="col-sm-2 col-form-label text-end"><?php echo $lng['categoria']; ?>: &nbsp;<h11>*</h11>&nbsp;</label>
			<div class="col-sm-7">
				<input type="text" class="form-control" id="prodCategoria" name="prodCategoria" placeholder="<?php echo $lng['categoriaProd']; ?>" value="<?php if ($op != "I") { echo $dados->prod_categoria; } ?>" <?php if ($op == "C") echo "readonly" ?>>
			</div>
	  	</div>

		  <div class="form-group row my-2">
			<label for="prodUndMedida" class="col-sm-2 col-form-label text-end"><?php echo $lng['undMedida']; ?>: &nbsp;<h11>*</h11>&nbsp;</label>
			<div class="col-sm-7">
				<input type="text" class="form-control" id="prodUndMedida" name="prodUndMedida" placeholder="<?php echo $lng['exUnd']; ?>" value="<?php if ($op != "I") { echo $dados->prod_und_medida; } ?>" <?php if ($op == "C") echo "readonly" ?>>
			</div>
	  	</div>
		
		<div class="form-group row my-2">
			<label for="prodQtde" class="col-sm-2 col-form-label text-end"><?php echo $lng['quantidade']; ?>: &nbsp;<h11>*</h11>&nbsp;</label>
			<div class="col-sm-7">
				<input type="number" class="form-control" id="prodQtde" name="prodQtde" placeholder="<?php echo $lng['quantidadeProduto']; ?>" value="<?php if ($op != "I") { echo $dados->prod_quantidade; } ?>" <?php if ($op == "C") echo "readonly" ?>>
			</div>
	  	</div>

		<div class="form-group row my-2">
			<label for="prodCompra" class="col-sm-2 col-form-label text-end"><?php echo $lng['precoCompra']; ?>: &nbsp;<h11>*</h11>&nbsp;</label>
			<div class="col-sm-7">
				<input type="text" class="form-control" id="prodCompra" name="prodCompra" placeholder="<?php echo $lng['exPreco']; ?>" value="<?php if ($op != "I") { echo $dados->prod_preco_compra; } ?>" <?php if ($op == "C") echo "readonly" ?>>
			</div>
	  	</div>

		<div class="form-group row my-2">
			<label for="prodVenda" class="col-sm-2 col-form-label text-end"><?php echo $lng['precoVenda']; ?>: &nbsp;<h11>*</h11>&nbsp;</label>
			<div class="col-sm-7">
				<input type="text" class="form-control" id="prodVenda" name="prodVenda" placeholder="<?php echo $lng['exPreco']; ?>" value="<?php if ($op != "I") { echo $dados->prod_preco_venda; } ?>" <?php if ($op == "C") echo "readonly" ?>>
			</div>
	  	</div>
		
		<div class="col-md-12 my-3">
        	<div class="form-group row">
				<div class="col-md-6 text-end">
					<button type="button" class="btn btn-dark" onClick="window.open('produto.php', '_self')"><?php echo $lng['sair']; ?></button>
				</div>
				<div class="col-md-6">
					<button type="submit" class="btn btn-dark" <?php if ($op == "C") echo "disabled" ?>><?php echo $lng['salvar']; ?></button>
				</div>
        </div>
    </div>
	</form>

	<p>&nbsp;</p>

	

<?php include_once("rodape.php"); ?>