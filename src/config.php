<?php
	function db_connect()
	{
		$host = "aws-0-sa-east-1.pooler.supabase.com";
		$db_name = "postgres";
		$port = "6543";
		$username = "postgres.bugsqngblwcrremeklmq";
		$password = "Spdmnlvhp153498@";
		
		try
		{
			$PDO = new PDO("pgsql:host=$host;port=$port;dbname=$db_name", $username, $password);
			$PDO->exec("SET client_encoding='utf-8'");
		
		// Realiza uma consulta simples que retorna 1 caso a consulta seja realizada corretamente
		$stmt = $PDO->query("SELECT 1");

		//caso consulta bem sucedida
		if ($stmt) {
			echo "Conexão bem-sucedida e verificada!";
		} else {
			echo "Conexão falhou na verificação.";
		}
	}

	catch (PDOException $e)
	{
		echo 'ERRO: ' . $e->getMessage();
	}
	return $PDO;
	}

	function ConverteData($data)
	{
    	if (strstr($data, "/"))//verifica se tem a barra /
     	{
			$d = explode ("/", $data);//tira a barra
			$rstData = "$d[2]-$d[1]-$d[0]";//separa as datas $d[2] = ano $d[1] = mes etc...
			return $rstData;
     	} 
	 	elseif(strstr($data, "-"))
	 	{
			$d = explode ("-", $data);
			$rstData = "$d[2]/$d[1]/$d[0]"; 
			return $rstData;
     	}
		else
	 	{ 
			return "Data inválida";
     	}
    }
	
	// db_connect();
?>