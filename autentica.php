<?php
	$key = "PortalZ";

    $data=$_REQUEST;

    include_once("config.php");

    $conexao = db_connect();

    extract($data);
	$email = $edtMail;
	$senha = base64_encode($edtSenha . '::' . $key);
	$status = "A";

	$resultado = "ERRO";
	
	$sql = "select usu_codigo, usu_nome, usu_tipo from usuario where usu_mail = :mail and usu_senha = :senha and usu_status = :status ";

    $comando = $conexao->prepare($sql);

    $comando->bindParam(':mail', $email);
	$comando->bindParam(':senha', $senha);
	$comando->bindParam(':status', $status);

    $comando->execute();

	if( $comando->rowCount() > 0)
	{
		$dados = $comando->fetch(PDO::FETCH_OBJ);
		
		$usu_codigo  = $dados->usu_codigo;
		$usu_nome 	 = $dados->usu_nome;
		$usu_tipo    = $dados->usu_tipo;

		
		session_start();
		
		$_SESSION['logged_in'] = true;
		$_SESSION['usu_codigo'] = $usu_codigo;
		$_SESSION['usu_nome']   = $usu_nome;
		$_SESSION['TEMPO'] = time();
		$_SESSION['usu_tipo'] = $usu_tipo;
		
		header('location: .');
	}
	else
	{
		header('location: login_invalido.php');
	}
?>