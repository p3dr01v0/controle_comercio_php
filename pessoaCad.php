<?php
	require_once("verifica.php");

	$data=$_REQUEST;

	include_once("config.php");

	$conexao = db_connect();

	extract($data);

?>

<?php include_once("cabec.php"); ?>

	<p>&nbsp;</p>

	<h2 align="center"><?php echo $lng['dadosPessoa']; ?></h2>

	
	<form class="form-inline row justify-content-center col-lg-12" action="usuarioGrava.php" method="post">
		<input type="hidden" name="edtCodigo"/>
		<input type="hidden" name="op"/>
		
		<div class="form-group col-sm-12 col-lg-10">
			<div class="control-label col-sm-11">
				<p class="help-block" align="right"><h11>*</h11> <?php echo $lng['campoObrigatorio']; ?> </p>
			</div>
		</div>
		
		<div class="form-group row my-2">
			<label for="edtMail" class="col-sm-2 col-form-label text-end"><?php echo $lng['email']; ?>: &nbsp;<h11>*</h11>&nbsp;</label>
			<div class="col-sm-7">
				<input type="text" class="form-control" id="edtMail" name="edtMail" placeholder="<?php echo $lng['emailPessoa']; ?>" value="">
			</div>
	  	</div>	
		
		<div class="form-group row my-2">
			<label for="edtSenha" class="col-sm-2 col-form-label text-end"><?php echo $lng['senha']; ?>: &nbsp;<h11>*</h11>&nbsp;</label>
			<div class="col-sm-7">
				<input type="password" class="form-control" id="edtSenha" name="edtSenha" placeholder="<?php echo $lng['senhaPessoa']; ?>" value="">
			</div>
	  	</div>
		
		<div class="form-group row my-2">
			<label for="edtNome" class="col-sm-2 col-form-label text-end"><?php echo $lng['nome']; ?>: &nbsp;<h11>*</h11>&nbsp;</label>
			<div class="col-sm-7">
				<input type="text" class="form-control" id="edtNome" name="edtNome" placeholder="<?php echo $lng['nomePessoa']; ?>" value="">
			</div>
	  	</div>
		
		<div class="form-group row my-2">
			<label for="edtStatus" class="col-sm-2 col-form-label text-end"><?php echo $lng['status']; ?>: &nbsp;<h11>*</h11>&nbsp;</label>
			<div class="col-sm-7">
				<select required="" id="edtStatus" name="edtStatus" class="form-control col-md-8">
					<option value="A"><?php echo $lng['ativo']; ?></option>
					<option value="I"><?php echo $lng['inativo']; ?></option>
				</select>
			</div>
	  	</div>
		
		<div class="form-group row my-2">
			<label for="edtTipo" class="col-sm-2 col-form-label text-end"><?php echo $lng['tipoPessoa']; ?>: &nbsp;<h11>*</h11>&nbsp;</label>
			<div class="col-sm-7">
				<select required="" id="edtTipo" name="edtTipo" class="form-control col-md-8">
					<option value="M">Master</option>
					<option value="A">Admin</option>
					<option value="O">Operador</option>
				</select>
			</div>
	  	</div>
		
		<div class="col-md-12 my-3" >
			<div class="form-group col-md-11">
				<label class="col-md-6">&nbsp;</label>
				<button type="button" class="btn btn-dark col-md-2" onClick="window.open('index.php', '_self')"><?php echo $lng['sair']; ?></button>
				<label class="col-md-1">&nbsp;</label>
				<button type="submit" class="btn btn-dark col-md-2"><?php echo $lng['salvar']; ?></button>
			</div>
		</div>
	</form>

	<p>&nbsp;</p>

	

<?php include_once("rodape.php"); ?>