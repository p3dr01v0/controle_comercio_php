<?php
	include_once("config.php");

	if (session_status() == PHP_SESSION_NONE) {
		session_start(); // Inicia a sessão apenas se não estiver iniciada
	}

	// Verificando se os dados necessários estão na sessão
	if (isset($_SESSION['venda_id']) && isset($_SESSION['produtos']) && isset($_SESSION['quantidades']) && isset($_SESSION['precos'])) {
		$venda_id = $_SESSION['venda_id'];
		$produtos = $_SESSION['produtos'];
		$quantidades = $_SESSION['quantidades'];
		$precos = $_SESSION['precos'];

		$conexao = db_connect();

		// Inserindo os itens vendidos
		for ($i = 0; $i < count($produtos); $i++) {
			$sql_insert_item = "INSERT INTO vendas_itens(venda_codigo, item_nome, item_quantidade)
								VALUES (:venda_codigo, :item_nome, :item_quantidade);";

			$comando = $conexao->prepare($sql_insert_item);

			$comando->bindParam(':venda_codigo', $venda_id);
			$comando->bindParam(':item_nome', $produtos[$i]);
			$comando->bindParam(':item_quantidade', $quantidades[$i]);

			$comando->execute();

			// Dar baixa no estoque
			$sql_baixa_estoque = "UPDATE produtos 
								   SET prod_quantidade = prod_quantidade - :item_quantidade 
								   WHERE prod_nome = :item_nome;";

			$comando_estoque = $conexao->prepare($sql_baixa_estoque);

			$comando_estoque->bindParam(':item_quantidade', $quantidades[$i]);
			$comando_estoque->bindParam(':item_nome', $produtos[$i]);

			$comando_estoque->execute();
		}

		header('location: .');

	} else {
		echo "Erro: dados de venda não encontrados.";
	}
?>
