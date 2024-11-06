<?php include_once("cabec.php"); ?>

	<p>&nbsp;</p>

	<h2 align="center" class="cor_texto"><?php echo $lng['erroAutentica']; ?></h2>

	<p>&nbsp;</p>

	<form action="login.php" method="post" class="form card-body row border-dark justify-content-center">
		<div class="col-lg-8 col-sm-12">
			<div class="row g-3 align-items-center">
				<h5 align="center" class="corTextoInverso"><?php echo $lng['loginFalhou']; ?></h5>
			</div>
			
			<p>&nbsp;</p>
			
			<div class="row g-3 align-items-center">
				<h5 align="center" class="corTextoInverso"><?php echo $lng['verifiqueSeusDados']; ?></h5>
			</div>
			
			<p>&nbsp;</p>

			<div class="row g-3 justify-content-center">
				<button type="submit" class="btn btn-lg bg-secondary cor_texto_barra btn-block col-lg-3"><?php echo $lng['voltarLogin']; ?></button>	
			</div>
			
		</div>
	</form>

	<p>&nbsp;</p>
	
<?php include_once("rodape.php"); ?>