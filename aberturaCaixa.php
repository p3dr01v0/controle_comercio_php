<?php
	require_once("verifica.php");

	include_once("cabec.php");

    date_default_timezone_set('America/Sao_Paulo');
	$data_hora = date('Y-m-d H:i:s');
?>

    <p>&nbsp;</p>

    <h2 align="center"><?php echo $lng['aberturaCaixa']; ?></h2>

    <p>&nbsp;</p>

    <form class="form-inline row justify-content-center col-lg-12" action="abrir_caixa_insert.php" method="post">

        <div class="form-group row my-2">
            <label for="edtOperador" class="col-sm-2 col-form-label text-end"><?php echo $lng['operador']; ?> &nbsp;<h11>*</h11>&nbsp;</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" id="edtOperador" name="edtOperador" value="<?php echo $_SESSION['usu_nome']?>" readonly>
            </div>
        </div>

        <div class="form-group row my-2">
            <label for="edtQuantidade" class="col-sm-2 col-form-label text-end"><?php echo $lng['valorCaixa']; ?>: &nbsp;<h11>*</h11>&nbsp;</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" id="edtQuantidade" name="edtQuantidade" value="200">
            </div>
        </div>

        <div class="form-group row my-2">
            <label for="edtPreco" class="col-sm-2 col-form-label text-end"><?php echo $lng['data']; ?>: &nbsp;<h11>*</h11>&nbsp;</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" id="edtPreco" name="edtPreco" value="<?php echo $data_hora ?>" readonly>
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