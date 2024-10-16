<?php
	$data=$_REQUEST;
    extract($data);

	setcookie('idioma', $idioma, strtotime( '+30 days' ) );
	header('location: idioma.php');
?>