<?php
    require_once("verifica.php");

    $data = $_REQUEST;

    include_once("config.php");

    $conexao = db_connect();

    extract($data);

    if ($op != "I") {
        $sql = "SELECT usu_codigo, usu_mail, usu_senha, usu_nome, usu_status, usu_data_cad, usu_tipo
                FROM usuario
                WHERE usu_codigo = :codigo";

        $comando = $conexao->prepare($sql);

        $comando->bindParam(':codigo', $codigo);

        $comando->execute();

        $dados = $comando->fetch(PDO::FETCH_OBJ);
    }
?>

<?php include_once("cabec.php"); ?>

<p>&nbsp;</p>

<h2 align="center"><?php echo $lng['dadosPessoa']; ?></h2>


<form class="form-inline row justify-content-center col-lg-12" action="usuarioGrava.php" method="post">
    <input type="hidden" name="edtCodigo" value="<?php if ($op != "I") { echo $dados->usu_codigo; } else { echo "0"; } ?>" />
    <input type="hidden" name="op" value="<?php echo $op; ?>" />

    <div class="form-group col-sm-12 col-lg-10">
        <div class="control-label col-sm-11">
            <p class="help-block" align="right"><h11>*</h11><?php echo $lng['campoObrigatorio']; ?></p>
        </div>
    </div>

    <div class="form-group row my-2">
        <label for="edtMail" class="col-sm-4 col-lg-2 col-form-label text-end"><?php echo $lng['email']; ?>: &nbsp;<h11>*</h11>&nbsp;</label>
        <div class="col-sm-8 col-lg-6">
            <input type="text" class="form-control" id="edtMail" name="edtMail" placeholder="e-mail do usuário" value="<?php if ($op != "I") { echo $dados->usu_mail; } ?>" <?php if ($op == "C") echo "readonly" ?>>
        </div>
    </div>

    <div class="form-group row my-2">
        <label for="edtSenha" class="col-sm-4 col-lg-2 col-form-label text-end"><?php echo $lng['senha']; ?>: &nbsp;<h11>*</h11>&nbsp;</label>
        <div class="col-sm-8 col-lg-6">
            <input type="password" class="form-control" id="edtSenha" name="edtSenha" placeholder="Senha do Usuário" value="<?php if ($op != "I") { echo '********'; } ?>" <?php if ($op != "I") echo "readonly" ?>>
        </div>
    </div>

    <div class="row g-3 align-items-center">
		<label for="edtNome" class="col-sm-4 col-lg-2 col-form-label text-end"><?php echo $lng['nomePessoa']; ?>: &nbsp;<h11>*</h11>&nbsp;</label>
		<div class="col-sm-8 col-lg-6">
			<input type="text" class="form-control" id="edtNome" name="edtNome" placeholder="Nome do Usuário" value="<?php if ($op != "I") { echo $dados->usu_nome; } ?>" <?php if ($op == "C") echo "readonly" ?>>
		</div>
    </div>

    <div class="form-group row my-2">
        <label class="col-sm-4 col-lg-2 col-form-label text-end"><?php echo $lng['data']; ?>: &nbsp;</label>
        <label class="col-sm-8 col-lg-6 col-form-label text-start"><?php if ($op != "I") { echo $dados->usu_data_cad; } else { echo '---'; } ?></label>
    </div>

    <div class="form-group row my-2">
        <label for="edtStatus" class="col-sm-4 col-lg-2 col-form-label text-end"><?php echo $lng['status']; ?>: &nbsp;<h11>*</h11>&nbsp;</label>
        <div class="col-sm-8 col-lg-6">
            <select required="" id="edtStatus" name="edtStatus" class="form-control" <?php if ($op == "C") echo "disabled" ?>>
                <option value="A" <?php if ($op != "I" && $dados->usu_status == "A") { echo "selected"; } ?>>Ativo</option>
                <option value="I" <?php if ($op != "I" && $dados->usu_status == "I") { echo "selected"; } ?>>Inativo</option>
            </select>
        </div>
    </div>

    <div class="form-group row my-2">
        <label for="edtTipo" class="col-sm-4 col-lg-2 col-form-label text-end"><?php echo $lng['tipoPessoa']; ?>: &nbsp;<h11>*</h11>&nbsp;</label>
        <div class="col-sm-8 col-lg-6">
            <select required="" id="edtTipo" name="edtTipo" class="form-control" <?php if ($op == "C") echo "disabled" ?>>
                <option value="M" <?php if ($op != "I" && $dados->usu_tipo == "M") { echo "selected"; } ?>>Master</option>
                <option value="A" <?php if ($op != "I" && $dados->usu_tipo == "A") { echo "selected"; } ?>>Admin</option>
                <option value="O" <?php if ($op != "I" && $dados->usu_tipo == "O") { echo "selected"; } ?>>Operador</option>
            </select>
        </div>
    </div>

    <div class="col-md-12 my-3">
        <div class="form-group row">
            <div class="col-md-6 text-end">
                <button type="button" class="btn btn-dark" onClick="window.open('usuario.php', '_self')"><?php echo $lng['sair']; ?></button>
            </div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-dark" <?php if ($op == "C") echo "disabled" ?>><?php echo $lng['salvar']; ?></button>
            </div>
        </div>
    </div>
</form>

<p>&nbsp;</p>

<?php include_once("rodape.php"); ?>
