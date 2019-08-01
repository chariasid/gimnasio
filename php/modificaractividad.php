<?php

	include './funciones.php';
	comprueba_admin();
?>
<!DOCTYPE html>
	<html lang='es'>
		<head>
			<?php
				head_interno();
			?>
		</head>

		<body>
			<div class='navbar navbar-inverse navbar-fixed-top' role='navigation'>					
			  <?php
			  	pinta_logo();
			  ?>
					
				<div id= 'navbar' class='navbar-collapse collapse'>
					<?php
						menu_administrador();
					?>
				</div>
			</div>
	
		

	<div id='empresa'>
		<div class='container'>

			<div class='row'>
			  <div class='col-xs-12'>
					<?php 
						if(isset($_GET['id']))
						{
							$id = $_GET['id'];
							$con = conectar ();
							$consulta = "select * from actividad where cod_actividad=$id";
							
							$datos = mysqli_query($con, $consulta);
							$fila=mysqli_fetch_array($datos, MYSQLI_ASSOC);
							echo "<br><br><br><br><br><h2 class='sectionTitle'>MODIFICAR ACTIVIDAD</h2>";
							//echo "<div class='container' style='text-align: center; height: 50vh; display:flex; align-items:center;'>";
							echo "<center><img src='../imagenes/actividades/$fila[foto]' class='img-circle' height='200px' width='200px'></center>";
							echo "<div id='acceso' class='col-xs-12'>";							
							echo "<form action='#' method='post'>
									<div class='inputContainer col-xs-12' style='text-align: center; align-items:center;'>
										<label>Nombre</label>
										<input type='text' name='nombre'  class='form-control' autocomplete='off' value='$fila[nombre]'/>
										<label>Precio</label>
										<input type='text' name='precio'  class='form-control ' autocomplete='off' value='$fila[precio]'/>
										<label>Descripción</label>
										<input type='text' name='descripcion'  class='form-control' autocomplete='off' value='$fila[descripcion]'/>
										
									<center><input class='btn btn-lg btn-success actionBtn' type='submit' name='enviar'></center>
									<br>
										
							</div>";
							mysqli_close($con);
						}
						if(isset($_POST['enviar']))
						{
							$nombre=$_POST['nombre'];
							$dni = $_POST['dni'];
							$apellidos = $_POST['ape'];
							$mail = $_POST['mail'];
							
							$user = $_POST['usuario'];
							$pass = $_POST['pass'];

							
							
							$con = conectar ();
							$consulta = "update monitor 
								set nombre='$nombre', apellidos = '$apellidos', email='$mail',
								usuario = '$user', contraseña = '$pass'
								where dni='$dni'";
							
							$datos = mysqli_query($con, $consulta);
							if(mysqli_affected_rows($con)==1)
							{
								echo "<h3><center>datos modificados correctamente</center></h3>";
								
							}
							mysqli_close($con);
						}
					?>
			    </div>
			</div>

			<div class='row'>

				
				
			</div>
		</div>
	</div> <!-- /empresa -->
	
	
	
		<?php
			footer();
		?>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js'></script>
    <script src='js/bootstrap.min.js'></script>
    <script src='js/flexslider.js'></script>
	
<script type='text/javascript'>
$(document).ready(function() {

	$('.mobileSlider').flexslider({
		animation: 'slide',
		slideshowSpeed: 3000,
		controlNav: false,
		directionNav: true,
		prevText: '&#171;',
		nextText: '&#187;'
	});
	$('.flexslider').flexslider({
		animation: 'slide',
		directionNav: false
	});
		
	$('a[href*=#]:not([href=#])').click(function() {
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') || location.hostname == this.hostname) {
			var target = $(this.hash);
			target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
			if ($(window).width() < 768) {
				if (target.length) {
					$('html,body').animate({
						scrollTop: target.offset().top - $('.navbar-header').outerHeight(true) + 1
					}, 1000);
					return false;
				}
			}
			else {
				if (target.length) {
					$('html,body').animate({
						scrollTop: target.offset().top - $('.navbar').outerHeight(true) + 1
					}, 1000);
					return false;
				}
			}

		}
	});
	
	$('#toTop').click(function() {
		$('html,body').animate({
			scrollTop: 0
		}, 1000);
	});
	
	var timer;
    $(window).bind('scroll',function () {
        clearTimeout(timer);
        timer = setTimeout( refresh , 50 );
    });
    var refresh = function () {
		if ($(window).scrollTop()>100) {
			$('.tagline').fadeTo( 'slow', 0 );
		}
		else {
			$('.tagline').fadeTo( 'slow', 1 );
		}
    };
		
});
</script>
  </body>
</html>