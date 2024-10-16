<?php
	include_once("config.php");

    $data = $_REQUEST;
    extract($data);

	date_default_timezone_set('America/Sao_Paulo');
	$data_hora = date('Y-m-d H:i:s');

	$conexao = db_connect();

	//verificando se a pagina foi acessada atraves de um metodo post
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		// Obtendo os arrays enviados
		$produtos = $_POST['edtNome'];
		$quantidades = $_POST['edtQuantidade'];
		$precos = $_POST['edtPreco'];
		$total_venda = 0;
	
		// "count" conta quantos valores tem em cada array, estamos verificando se todos estão de acordo
		if (count($produtos) == count($quantidades) && count($produtos) == count($precos)) {
			
			//fazemos o iisnert dos dados
			$sql_insert_venda = "insert into vendas(venda_forma_pagamento, venda_valor, venda_valor_pago, venda_troco, venda_data)
			values (:venda_forma_pagamento, :venda_valor, :venda_valor_pago,:venda_troco, :venda_data);";

			$comando = $conexao->prepare($sql_insert_venda);

			$comando->bindParam(':venda_forma_pagamento',	$edtFormaPag);
			$comando->bindParam(':venda_valor',				$edtTotal);
			$comando->bindParam(':venda_valor_pago',		$edtPagamento);
			$comando->bindParam(':venda_troco',				$edtTroco);
			$comando->bindParam(':venda_data',				$data_hora);

			$comando->execute();

			//vamos pegar o ultimo insert realizado e pegar o campo id dele
			$sql_pegar_id = "SELECT venda_codigo FROM vendas ORDER BY venda_data DESC LIMIT 1;";

			$comando = $conexao->prepare($sql_pegar_id);

			$comando->execute();

			$venda = $comando->fetch(PDO::FETCH_ASSOC);

			$venda_id = $venda['venda_codigo'];

			//verifica sessão
			if (session_status() == PHP_SESSION_NONE) {
				session_start(); // Inicia a sessão apenas se não estiver iniciada
			}

			$_SESSION['venda_id'] = $venda_id;
			$_SESSION['produtos'] = $produtos;
			$_SESSION['quantidades'] = $quantidades;
			$_SESSION['precos'] = $precos;

			header('location: venda_insert_itens.php');

		}
		else {
			echo "Erro: o número de produtos, quantidades e preços não coincide.";
		}
	}
	else {
		header("Location: venda_etp_um.php");
		exit;
	}
	
?>