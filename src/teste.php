<?php

$key = "PortalZ";

$edtSenha="cG9ydGFsejEyMzo6UG9ydGFsWg==";

$senha = base64_decode($edtSenha . '::' . $key);


echo $senha;
?>