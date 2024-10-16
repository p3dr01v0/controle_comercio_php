<?php

	require_once("verifica.php");
    
	include_once("cabec.php");


// Recupera o resultado da sessão
$resultado = $_SESSION['resultado'] ?? null;

// Limpa o resultado da sessão após exibí-lo
unset($_SESSION['resultado']);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Resultado da Consulta</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container">
        <h1><?php echo $lng['resultadoCep'];?></h1>
        <div id="endereco">
            <?php if ($resultado): ?>
                <?php if (isset($resultado['error'])): ?>
                    <p class="error"><?php echo $resultado['error']; ?></p>
                <?php else: ?>
                    <p><strong><?php echo $lng['logradouro'];?></strong> <?php echo $resultado['logradouro']; ?></p>
                    <p><strong><?php echo $lng['bairro'];?></strong> <?php echo $resultado['bairro']; ?></p>
                    <p><strong><?php echo $lng['cidade'];?></strong> <?php echo $resultado['localidade']; ?></p>
                    <p><strong><?php echo $lng['estado'];?></strong> <?php echo $resultado['uf']; ?></p>
                <?php endif; ?>
            <?php else: ?>
                <p><?php echo $lng['nenhumResultado'];?></p>
            <?php endif; ?>
        </div>
        <a href="recebe_cep.php" class="btn_cep"><?php echo $lng['voltar'];?></a>
    </div>
</body>
</html>
