<?php
	include './funciones.php';
	comprueba_admin();
?>
<!DOCTYPE html>
	<html lang='es'>
		<head>
			<meta charset='utf-8'>
			<meta http-equiv='X-UA-Compatible' content='IE=edge'>
			<meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no'>
			<meta name='description' content='A Bootstrap based app landing page template'>
			<meta name='author' content=''>
			<link rel='shortcut icon' href='assets/ico/favicon.ico'>

			<title>Clínica veterinaria</title>
			 <link href='https://fonts.googleapis.com/css?family=Dosis:400,600,700' rel='stylesheet' type='text/css'>	
			<link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
			<!-- Bootstrap core CSS -->
			<link href='../css/bootstrap.min.css' rel='stylesheet'>

			<!-- Custom styles for this template -->
			<link href='../css/custom.css' rel='stylesheet'>
			<link href='../css/flexslider.css' rel='stylesheet'>
			
			<link href='http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css' rel='stylesheet'>
			<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,700' rel='stylesheet' type='text/css'>

			<link href='http://fonts.googleapis.com/css?family=Noto+Sans:400,700' rel='stylesheet' type='text/css'>

			<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
			<!--[if lt IE 9]>
			<script src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js'></script>
			<script src='https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js'></script>
			<![endif]-->
			<style>
				
			</style>
		</head>

		<body>
			<div class='navbar navbar-inverse navbar-fixed-top' role='navigation'>
				<div class='container'>
					<div class='navbar-header'>
					  <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='.navbar-collapse'>
							<span class='sr-only'>Navigacion Menu</span>
							<span class='icon-bar'></span>
							<span class='icon-bar'></span>
							<span class='icon-bar'></span>
						</button>
						<a class='navbar-brand' href='../index.php'>
						CANIX<span class='title'> V0</span>
                        
						</a>
					</div>
					<div id= 'navbar' class='navbar-collapse collapse'>
						<ul class='nav navbar-nav'>
							<li > 
							 <a href='clientes.php' > CLIENTES  </a>															
							</li>	
							<li > 
							 <a href='productos.php' > PRODUCTOS  </a>															
							</li>
							<li > 
							 <a href='servicios.php' > SERVICIOS  </a>															
							</li>
							<li > 
							 <a href='citas.php' > CITAS  </a>															
							</li>
							<li > 
							 <a href='testimonios.php' > TESTIMONIOS  </a>															
							</li>
							<li > 
							 <a href='noticias.php' > NOTICIAS  </a>															
							</li>
							<li > 
							 <a href="salir.php" > CERRAR SESIÓN "ADMINISTRADOR"  </a>																
							</li>
								
							
						</ul>
					</div><!--/.nav-collapse -->
					<div id= 'navbar' class='navbar-collapse collapse'>
						<ul class='nav navbar-nav'>
							<li > 
							 <a href="insertarproducto.php" > INSERTAR PRODUCTOS  </a>															
							</li>	
							<li > 
							 <a href="buscarproducto.php" > BUSCAR PRODUCTOS  </a>															
							</li>
						</ul>
					</div><!--/.nav-collapse -->
				</div>
			</div>
	
			<div id='cabecera' class='jumbotron'>
			
			</div>

	<div id='empresa'>
		<div class='container'>

			<div class='row'>
			  <div class='col-xs-12'>
					<?php 
							
							echo "<div class='container' style='text-align: center; height: 50vh; display:flex; align-items:center;'>";
							echo "<div id='acceso' class='col-xs-12'>";
							echo "<h2 class='sectionTitle'>NUEVO PRODUCTO</h2>";
							echo "<form action='#' method='post' enctype='multipart/form-data'>
									<div class='inputContainer'>
										<label>Nombre</label>
										<input type='text' name='nombre'  class='form-control' autocomplete='off'/>
									
										<label>Precio</label>
										<input type='text' name='precio' class='form-control' autocomplete='off' />
										
									<br>
										<input class='btn btn-lg btn-success actionBtn' type='submit' name='enviar'>";
							echo "</div></div></form></div>";
						
						
						if(isset($_POST['enviar']))
						{
							
							$nombre=$_POST['nombre'];
							$precio=$_POST['precio'];
							
							$con = conectar ();
							
							
							$consulta = "insert into productos values (null, '$nombre', $precio)";
							
							
							mysqli_query($con, $consulta);
							if(mysqli_affected_rows($con)==1)
							{
								echo "<h3><center>Nuevo producto insertado correctamente</center></h3>";
							
							}
							mysqli_close($con);
						}
					?>
			    </div>
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