<?php
require_once("verifica.php");
include_once("config.php");
include_once("cabec.php");

date_default_timezone_set('America/Sao_Paulo');
$data_hora = date('Y-m-d H:i:s');

// Conectar ao banco de dados
$conexao = db_connect();

// Obter o caixa aberto
$sql_caixa_aberto = "SELECT abrir_caixa_codigo, abrir_caixa_data, abrir_caixa_valor FROM abrir_caixa WHERE abrir_caixa_codigo NOT IN (SELECT abrir_caixa_codigo FROM fechar_caixa) LIMIT 1";
$result_caixa_aberto = $conexao->query($sql_caixa_aberto);
$caixa_aberto = $result_caixa_aberto->fetch(PDO::FETCH_ASSOC);

if (!$caixa_aberto) {
    echo "<p>Nenhum caixa aberto encontrado.</p>";
    exit;
}

$abrir_caixa_codigo = $caixa_aberto['abrir_caixa_codigo'];
$data_abertura = $caixa_aberto['abrir_caixa_data'];
$valor_inicial = $caixa_aberto['abrir_caixa_valor'];

// Consulta para obter o total de vendas e troco após a data de abertura do caixa
$sql_vendas = "SELECT 
                   COALESCE(SUM(venda_valor_pago), 0) AS total_vendas, 
                   COALESCE(SUM(venda_troco), 0) AS total_troco 
               FROM vendas 
               WHERE venda_data >= :data_abertura";

$comando_vendas = $conexao->prepare($sql_vendas);
$comando_vendas->bindParam(':data_abertura', $data_abertura);
$comando_vendas->execute();

$resultados = $comando_vendas->fetch(PDO::FETCH_ASSOC);

$totalVendas = $resultados['total_vendas'];
$totalTroco = $resultados['total_troco'];

// Calcular o valor atual do caixa
$valorCaixa = $valor_inicial + $totalVendas - $totalTroco;
?>

<p>&nbsp;</p>

<h2 align="center"><?php echo $lng['fechamentoCaixa']; ?></h2>

<p>&nbsp;</p>

<form class="form-inline row justify-content-center col-lg-12" action="fechar_caixa_insert.php" method="post">

    <div class="form-group row my-2">
        <label for="edtOperador" class="col-sm-2 col-form-label text-end"><?php echo $lng['operador']; ?> &nbsp;<h11>*</h11>&nbsp;</label>
        <div class="col-sm-7">
            <input type="text" class="form-control" id="edtOperador" name="edtOperador" value="<?php echo $_SESSION['usu_nome']?>" readonly>
        </div>
    </div>

    <div class="form-group row my-2">
        <label for="edtAbrirCaixa" class="col-sm-2 col-form-label text-end"><?php echo $lng['caixaAberto']; ?>: &nbsp;<h11>*</h11>&nbsp;</label>
        <div class="col-sm-7">
            <input type="text" class="form-control" id="edtAbrirCaixa" name="edtAbrirCaixa" value="<?php echo $abrir_caixa_codigo; ?>" readonly>
        </div>
    </div>

    <div class="form-group row my-2">
        <label for="edtValor" class="col-sm-2 col-form-label text-end"><?php echo $lng['valorCaixa']; ?>: &nbsp;<h11>*</h11>&nbsp;</label>
        <div class="col-sm-7">
            <input type="text" class="form-control" id="edtValor" name="edtValor" value="<?php echo number_format($valorCaixa, 2, '.', ''); ?>" readonly>
        </div>
    </div>

    <div class="form-group row my-2">
        <label for="edtData" class="col-sm-2 col-form-label text-end"><?php echo $lng['data']; ?>: &nbsp;<h11>*</h11>&nbsp;</label>
        <div class="col-sm-7">
            <input type="text" class="form-control" id="edtData" name="edtData" value="<?php echo $data_hora ?>" readonly>
        </div>
    </div>

    <p>&nbsp;</p>

    <div class="col-md-12 my-3">
        <div class="form-group row">

            <div class="col-md-6 text-end">
                <button type="button" class="btn btn-dark" onClick="window.open('venda_etp_um.php', '_self')"><?php echo $lng['voltar']; ?></button>
            </div>

            <div class="col-md-6">
                <button type="submit" class="btn btn-dark"><?php echo $lng['salvar']; ?></button>
            </div>

        </div>
    </div>

</form>

<?php
include_once("rodape.php");
?>
