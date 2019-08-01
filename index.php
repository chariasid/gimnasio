<?php
	include "./php/funciones.php";
	session_start();
	if(!isset($_SESSION['user']))
	{
		if(isset($_COOKIE['sesion']))
		{
			session_decode($_SESSION);
		}
	}
?>
<!DOCTYPE html>
	<html lang="es">
		<head>
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
			<meta name="description" content="A Bootstrap based app landing page template">
			<meta name="author" content="">
			<link rel="shortcut icon" href="assets/ico/favicon.ico">

			<title>Gimnasio</title>
			 <link href='https://fonts.googleapis.com/css?family=Dosis:400,600,700' rel='stylesheet' type='text/css'>	
			<link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
			<!-- Bootstrap core CSS -->
			<link href="css/bootstrap.min.css" rel="stylesheet">

			<!-- Custom styles for this template -->
			<link href="css/custom.css" rel="stylesheet">
			<!-- <link href="css/flexslider.css" rel="stylesheet"> -->
			
			<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
			<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,700' rel='stylesheet' type='text/css'>

			<link href='http://fonts.googleapis.com/css?family=Noto+Sans:400,700' rel='stylesheet' type='text/css'>

			<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" > -->
			<!-- Minified JS library -->
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
			<!-- Compiled and minified Bootstrap JavaScript -->
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" ></script>
			<style>
				
			</style>
		</head>

		<body>
			<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
				<div class="container">
					<div class="navbar-header">
					  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="sr-only">Navigacion Menu</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<?php pinta_logo(1); ?>
						</a>
					</div>
					<div class="collapse navbar-collapse appiNav">
						<ul class="nav navbar-nav">
							
							<li><a href="#empresa">Actividades</a></li>
							<li><a href="#noticias">Monitores</a></li>
							<li><a href="#contactWrap">Contacto</a></li>
							
							<?php
								if(isset($_SESSION['user']))
								{
									echo"<li><a href='./php/salir.php'> Cerrar sesión de \"$_SESSION[user]\"</a></li>";
								}
								else
								{	
									echo "<li><a href='./php/accede.php'>Accede</a></li>";
								}
							?>
						</ul>
					</div><!--/.nav-collapse -->
				</div>
			</div>

			<br><br><br><br>	
			<div background-color='#ffffff'  id="myCarousel" class="carousel slide" data-ride="carousel" align= 'center'>
			    <!-- Wrapper for slides -->
			    <div class="carousel-inner">
			    	<?php
			    		$fotos = scandir("./fotos");
			    		unset($fotos[0]);
			    		unset($fotos[1]);
			    		echo "<div class='item active' >";
			            		echo"<img src='./fotos/$fotos[2]' width='657' height='395'>";
			        		echo "</div>";
			        	unset($fotos[2]);
			    		foreach ($fotos as $a)
			    		{
			    			echo "<div class='item ' >";
			            		echo "<img src='./fotos/$a' width='657' height='395'>";
			        		echo "</div>";
			        	}
			        ?>
			    </div>

			    <!-- Controls -->
			    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
			        <span class="glyphicon glyphicon-chevron-left"></span>
			        <span class="sr-only">Previous</span>
			    </a>
			    <a class="right carousel-control" href="#myCarousel" data-slide="next">
			        <span class="glyphicon glyphicon-chevron-right"></span>
			        <span class="sr-only">Next</span>
			    </a>
			</div>
		
			
							
		

	<div id="empresa">
		<div class="container">

			<?php  actividades_inicio(); ?>
		</div>
	</div> <!-- /empresa -->
	
	<div id="noticias" class="altWrap">
		<div class="container">
			<div class="row">
			  <div class="col-xs-12">
					<h2 class="sectionTitle">NUESTROS MONITORES</h2>
			    </div>
			</div>
			<?php
				monitores_inicio();
			?>
		</div>
	</div> <!-- /noticias -->
	
	<div id="pricingWrap"></div> <!-- /pricingWrap -->
	
	
	
	<div id="contactWrap">
		<div class="overlay">
			<div class="container">
				<div class="row">
						<div class="col-xs-12">
						<h2 class="sectionTitle">CONTACTA CON NOSOTROS</h2>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-6 text-center">
						<div class="blurb">
						<h3 class="seccion"><b> Datos de contacto</b></h3>
						<br>
						<p class='mi_clase'>
						Gimnasio Mi Proyecto<br>
						Avenida Doctor Olóriz, 6 <br>
						Granada<br>
						958 - 27 80 60 
						</p>
						</div>
					</div>
					<div class="col-xs-6 text-center">
						<div class="blurb">
						<h3 class="seccion"><b> ¿Dónde estamos?</b></h3>
						<br>
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3178.5570460220356!2d-3.6098417843959214!3d37.1869964798707!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd71fcef3c4fe4ff%3A0xb362c7165dc2ded2!2sEscuela+Arte+Granada!5e0!3m2!1ses!2ses!4v1563881183170!5m2!1ses!2ses" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
						</div>
					</div>
				</div>
					
			</div>
		</div>
	</div> <!-- /contactWrap -->
	
		<?php
			footer();
		?>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/flexslider.js"></script>
	
<script type="text/javascript">
$(document).ready(function() {

	$('.mobileSlider').flexslider({
		animation: "slide",
		slideshowSpeed: 3000,
		controlNav: false,
		directionNav: true,
		prevText: "&#171;",
		nextText: "&#187;"
	});
	$('.flexslider').flexslider({
		animation: "slide",
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
			$(".tagline").fadeTo( "slow", 0 );
		}
		else {
			$(".tagline").fadeTo( "slow", 1 );
		}
    };
		
});
</script>
  </body>
</html>