<?php
    require_once("verifica.php");
    include_once("config.php");

    // Verificando se a página foi acessada via método POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $operador = $_POST['edtOperador'];
        $valorCaixa = $_POST['edtQuantidade'];
        $dataCaixa = $_POST['edtPreco'];

        $conexao = db_connect();

        $sql_abrir_caixa = "INSERT INTO abrir_caixa (abrir_caixa_operador, abrir_caixa_valor, abrir_caixa_data) 
                            VALUES (:operador, :valor, :dataCaixa);";

        $comando = $conexao->prepare($sql_abrir_caixa);

        $comando->bindParam(':operador', $operador);
        $comando->bindParam(':valor', $valorCaixa);
        $comando->bindParam(':dataCaixa', $dataCaixa);

        $comando->execute();

        header('Location: .');
        exit;
    } else {
        header("Location: aberturaCaixa.php");
        exit;
    }
?>
