<?php
    include_once("verifica.php");

    $data = $_REQUEST;

    include_once("config.php");

    $conexao = db_connect();

    extract($data);

    date_default_timezone_set('America/Sao_Paulo');
	$data_hora = date('Y-m-d H:i:s');

    if( $op == "A" ){
        $sql = "update produtos set prod_nome = :prod_nome, prod_fornecedor = :prod_fornecedor, prod_marca = :prod_marca,
            prod_categoria = :prod_categoria, prod_und_medida = :prod_und_medida, prod_quantidade = :prod_quantidade,
            prod_preco_compra = :prod_preco_compra, prod_preco_venda = :prod_preco_venda,
            prod_data_atualizacao = :prod_data_atualizacao 
            where codigo_produto = :codigo";

        $comando = $conexao->prepare($sql);

        $comando->bindParam(':codigo',                  $edtCodigo);
        $comando->bindParam(':prod_nome',               $prodNome);
        $comando->bindParam(':prod_fornecedor',         $prodFornecedor);
        $comando->bindParam(':prod_marca',              $prodMarca);
        $comando->bindParam(':prod_categoria',          $prodCategoria);
        $comando->bindParam(':prod_und_medida',         $prodUndMedida);
        $comando->bindParam(':prod_quantidade',         $prodQtde);
        $comando->bindParam(':prod_preco_compra',       $prodCompra);
        $comando->bindParam(':prod_preco_venda',        $prodVenda);
        $comando->bindParam(':prod_data_atualizacao',   $data_hora);

        $comando->execute();
    }
    else{

        $sql = "insert into produtos (prod_nome, prod_fornecedor, prod_marca, prod_categoria, prod_und_medida,
            prod_quantidade, prod_preco_compra, prod_preco_venda, prod_data_cad, prod_data_atualizacao) values

            (:prod_nome, :prod_fornecedor, :prod_marca, :prod_categoria, :prod_und_medida, :prod_quantidade,
            :prod_preco_compra, :prod_preco_venda, :prod_data_cad, :prod_data_atualizacao);";

        $comando = $conexao->prepare($sql);

        $comando->bindParam(':prod_nome',               $prodNome);
        $comando->bindParam(':prod_fornecedor',         $prodFornecedor);
        $comando->bindParam(':prod_marca',              $prodMarca);
        $comando->bindParam(':prod_categoria',          $prodCategoria); 
        $comando->bindParam(':prod_und_medida',         $prodUndMedida);
        $comando->bindParam(':prod_quantidade',         $prodQtde);
        $comando->bindParam(':prod_preco_compra',       $prodCompra);
        $comando->bindParam(':prod_preco_venda',        $prodVenda);
        $comando->bindParam(':prod_data_cad',           $data_hora);
        $comando->bindParam(':prod_data_atualizacao',   $data_hora);

        $comando->execute();
    }
    
    header('location: produto.php');

?>
