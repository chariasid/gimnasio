<?php
	session_start();
	$_SESSION=array();
	session_destroy();
	if(isset($_COOKIE['sesion']))
	{
		setcookie('sesion');
	}
	header('location:../index.php');

?>