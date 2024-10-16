<?php
	require_once("verifica.php");
    
	include_once("cabec.php");

?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container">
        <h1><?php echo $lng['buscarCep'];?></h1>
        <form method="post" action="consulta_cep.php">
            <input type="text" name="cep" placeholder="Digite o CEP" maxlength="8" required>
            <button class="btn_cep" type="submit"><?php echo $lng['buscar'];?></button>
        </form>
    </div>
</body>
</html>

<?php
	include_once("rodape.php");
?>