<?php
	session_start();
	session_destroy();

	// setcookie('usu_tipo', ' ');
	header('location: login.php');
?>