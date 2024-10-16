<?php
session_start();

// Função para consultar o CEP
function consultarCep($cep) {

    // url da api
    $url = "https://viacep.com.br/ws/$cep/json/";

    // inicia uma nova sessão cURL e define as opções de requisição incluindo a URL da API
    // e a configuração para retornar o resultado como string
    $requisição = curl_init();
    curl_setopt($requisição, CURLOPT_URL, $url);
    curl_setopt($requisição, CURLOPT_RETURNTRANSFER, true);

    // acessa a "api" e armazena a respota da mesma
    $resposta = curl_exec($requisição);
    // fechaa a sessão
    curl_close($requisição);

    //Converte a resposta JSON em um array associativo PHP.
    $info = json_decode($resposta, true);

    // Verifica se o campo 'erro' está presente na resposta
    if (isset($info['erro'])) {
        return ['error' => 'CEP não encontrado.'];
    }

    return $info;
}

// Obtém o CEP do formulário
$cep = $_POST['cep'] ?? '';

// Consulta o CEP
$resultado = consultarCep($cep);

// Armazena o resultado na sessão
$_SESSION['resultado'] = $resultado;

// Redireciona para a página de resultado
header('Location: resultado_cep.php');
exit();
