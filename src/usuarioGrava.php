<?php
	include_once("verifica.php");

	$key = "PortalZ";

    $data = $_REQUEST;

    include_once("config.php");

    $conexao = db_connect();

    extract($data);
	$senha = base64_encode($edtSenha . '::' . $key);
	
	$resultado = "ERRO";
	
	// estamos passando o fuso-horario de SP
	date_default_timezone_set('America/Sao_Paulo');
	$data_hora = date('Y-m-d H:i:s');
	
	if( $op == "A")
	{
		$sql = "update usuario set usu_mail = :mail, usu_nome = :nome,
				usu_status = :status, usu_tipo = :tipo  
				where usu_codigo = :codigo ";

		$comando = $conexao->prepare($sql);

		$comando->bindParam(':codigo', 		$edtCodigo);
		$comando->bindParam(':mail', 		$edtMail);
		$comando->bindParam(':nome', 		$edtNome);
		$comando->bindParam(':status', 		$edtStatus);
		$comando->bindParam(':tipo', 		$edtTipo);

		$comando->execute();
	}
	else
	{
		$sql = "insert into usuario ( usu_mail, usu_senha, usu_nome, usu_status, usu_tipo, usu_data_cad )
				values( :mail, :senha, :nome, :status, :tipo, :data ) ";

		$comando = $conexao->prepare($sql);

		$comando->bindParam(':mail', 		$edtMail);
		$comando->bindParam(':senha', 		$senha);
		$comando->bindParam(':nome', 		$edtNome);
		$comando->bindParam(':status', 		$edtStatus);
		$comando->bindParam(':tipo', 		$edtTipo);
		$comando->bindParam(':data', 		$data_hora);


		$comando->execute();
	}

	header('location: usuario.php');
?>