<?php
	include "funciones.php";
	session_start();

	if(isset($_POST['enviar']))
	{
		$nom = $_POST['usuario'];
		$pass = $_POST['pass'];
	
		if($nom=='admin' and $pass='admin')
		{
			$_SESSION['user']='admin';
			if(isset($_POST['mantener']))
			{
				$cook = session_encode();
				setcookie('sesion', $cook, time()+86400, '/');
			}
			header('location:administracion.php');
			echo "entra correcto";
		}
		else
		{

			$con = conectar();
			$consulta = "select * from clientes where nombre_dueño = '$nom' and pass='$pass'";
			$datos = mysqli_query($con, $consulta);
			$num = mysqli_num_rows($datos);
			if($num>0)
			{	
				
				$_SESSION['user']=$nom;
				if(isset($_POST['mantener']))
				{
					$cook = session_encode();
					setcookie('sesion', $cook, time()+86400, '/');
				}	
				header('location:administracion_usuario.php');
			}
			else
				header('location:accede.php');
		}
	}
	else
	{
		header('location:accede.php');
	}	


?>