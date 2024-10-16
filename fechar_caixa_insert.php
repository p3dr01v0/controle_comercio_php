<?php
require_once("verifica.php");
include_once("config.php");

// Verificando se a página foi acessada via método POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $operador = $_POST['edtOperador'];
    $abrir_caixa_codigo = $_POST['edtAbrirCaixa'];
    $valorCaixa = $_POST['edtValor'];
    $dataCaixa = $_POST['edtData'];

    $conexao = db_connect();

    $sql_fechar_caixa = "INSERT INTO fechar_caixa (abrir_caixa_codigo, fechar_caixa_operador, fechar_caixa_valor, fechar_caixa_data) 
                        VALUES (:abrir_caixa_codigo, :operador, :valor, :dataCaixa);";

    $comando = $conexao->prepare($sql_fechar_caixa);

    $comando->bindParam(':abrir_caixa_codigo', $abrir_caixa_codigo);
    $comando->bindParam(':operador', $operador);
    $comando->bindParam(':valor', $valorCaixa);
    $comando->bindParam(':dataCaixa', $dataCaixa);

    // Executando o comando e verificando se ocorreu algum erro
    if ($comando->execute()) {
        header('Location: .');
    } else {
        // Exibir informações sobre o erro
        $errorInfo = $comando->errorInfo();
        echo "Erro ao fechar caixa: " . $errorInfo[2];
    }
    exit;
} else {
    header("Location: fechamentoCaixa.php");
    exit;
}
?>
