<?php include_once("cabec.php"); ?>

	<p>&nbsp;</p>

	<h2 align="center" class="cor_texto"><?php echo $lng['acessoSistema']; ?></h2>

	<form action="autentica.php" method="post" class="form card-body row border-dark justify-content-center">
		<div class="col-lg-8 col-sm-12">
			<div class="row g-3 align-items-center">
				<div class="col-lg-2 col-sm-12 ">
					&nbsp;
				</div>
				<div class="col-auto">
					<label for="edtMail" class="col-form-label corTextoInverso"><?php echo $lng['email']; ?></label>
				</div>
				<div class="col-auto">
					<input type="email" id="edtMail" name="edtMail" size="80" class="form-control" aria-describedby="textoHelpEmail">
				</div>
			</div>
			
			<p>&nbsp;</p>
			
			
			<div class="row g-3 align-items-center">
				<div class="col-lg-2 col-sm-12 ">
					&nbsp;
				</div>
				<div class="col-auto">
					<label for="edtSenha" class="col-form-label corTextoInverso"><?php echo $lng['senha']; ?></label>
				</div>
				<div class="col-auto">
					<input type="password" id="edtSenha" name="edtSenha" size="80" class="form-control" aria-describedby="textoHelpSenha">
				</div>
			</div>
			
			<p>&nbsp;</p>

			<div class="row g-3 justify-content-center">
				<button type="submit" class="btn btn-lg bg-secondary cor_texto_barra btn-block col-lg-3"><?php echo $lng['entrar']; ?></button>	
			</div>
			
		</div>
	</form>

	<p>&nbsp;</p>
	<p>&nbsp;</p>

<?php include_once("rodape.php"); ?>