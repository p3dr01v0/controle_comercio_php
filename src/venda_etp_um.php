<?php
	require_once("verifica.php");
	include_once("config.php");
	include_once("cabec.php");

	$conexao = db_connect();

	$sql = "SELECT prod_nome, prod_quantidade, prod_preco_venda FROM produtos ORDER BY prod_nome";
	$comando = $conexao->prepare($sql);
	$comando->execute();

	$nome_produtos = $comando->fetchAll(PDO::FETCH_COLUMN);

	date_default_timezone_set('America/Sao_Paulo');
	$data_hora = date('Y-m-d H:i:s');
	
?>

<p>&nbsp;</p>

<h2 align="center"><?php echo $lng['realizandoVenda']; ?></h2>

	<form class="form-inline row justify-content-center col-lg-12" action="venda_etp_dois.php" method="post">

		<div id="container_produtos" class="col-sm-12 col-lg-10 ">

			<div class="col-md-11 text-end mb-4 ms-5">
				<button type="button" class="btn btn-success" id="add-product-btn"><?php echo $lng['adicionarItem']; ?></button>
			</div>

			<p>&nbsp;</p>

			<div class="form-group row my-2 campos_produtos">
				<label for="edtNome" class="col-md-2 col-form-label text-end"><?php echo $lng['produto']; ?>: &nbsp;<h11>*</h11>&nbsp;</label>
				<div class="col-md-8">
					<select required id="edtNome" name="edtNome[]" class="form-control">
						<?php foreach($nome_produtos as $nome): ?>
							<option value="<?php echo $nome; ?>"><?php echo $nome; ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="col-md-2">
					<button type="button" class="btn btn-danger remove-product-btn"><?php echo $lng['remover']; ?></button>
				</div>
			</div>
			
		</div>

		<div class="col-md-12 my-3">
			<div class="form-group row">

				<div class="col-md-6 text-end">
					<button type="button" class="btn btn-dark" onClick="window.open('index.php', '_self')"><?php echo $lng['sair']; ?></button>
				</div>

				<div class="col-md-6">
					<button type="submit" class="btn btn-dark"><?php echo $lng['seguinte']; ?></button>
				</div>

			</div>
		</div>

		<p>&nbsp;</p>

	</form>

<script>
	//selecionando o elemento com o id especificado e adicionando um ouvinte a ele e passamos a função abrindo "{}"
    document.getElementById('add-product-btn').addEventListener('click', function() {

		// selecionando o container com o id especificado, vai ser nesse container que que novos conjuntos de campos serão adicionados
        const container = document.getElementById('container_produtos');

		//estamos especificando o elemento e o clonando com "cloneNode(true)"
        const campo_clonado = document.querySelector('.campos_produtos').cloneNode(true);

		// selecionando o select do novo campo e apagando seu valor
        container.appendChild(campo_clonado);

        // estamos adicionadndo a possiblidade de remover um item
        campo_clonado.querySelector('.remove-product-btn').addEventListener('click', function() {
            container.removeChild(campo_clonado);
        });
    });
</script>

<?php include_once("rodape.php"); ?>
