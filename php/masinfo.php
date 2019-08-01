<?php
	include "funciones.php";
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

			<title>Clínica veterinaria</title>
			 <link href='https://fonts.googleapis.com/css?family=Dosis:400,600,700' rel='stylesheet' type='text/css'>	
			<link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
			<!-- Bootstrap core CSS -->
			<link href="../css/bootstrap.min.css" rel="stylesheet">

			<!-- Custom styles for this template -->
			<link href="../css/custom.css" rel="stylesheet">
			<link href="../css/flexslider.css" rel="stylesheet">
			
			<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
			<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,700' rel='stylesheet' type='text/css'>

			<link href='http://fonts.googleapis.com/css?family=Noto+Sans:400,700' rel='stylesheet' type='text/css'>

			<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
			<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
			<![endif]-->
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
						<a class="navbar-brand" href="../index.php">
						CANIX<span class="title"> V0</span>
                        
						</a>
					</div>
					<div class="collapse navbar-collapse appiNav">
						<ul class="nav navbar-nav">
							<li><a href="../index.php#empresa">Home</a></li>
							<li><a href="../index.php#empresa">Empresa</a></li>
							<li><a href="../index.php#noticias">Noticias</a></li>
							<li><a href="../index.php#testimonialsWrap">Testimonios</a></li>
							<li><a href="../index.php#contactWrap">Contacto</a></li>
							<li><a href="accede.php">Accede</a></li>
						</ul>
					</div><!--/.nav-collapse -->
				</div>
			</div>
	
			

	<div id="noticia">
		<div class="container">

					<h2 class="sectionTitle">NOTICIA</h2>
					<?php
						if(isset($_GET['cod']))
						{
							$cod = $_GET['cod'];
							$con = conectar();

							$consulta = "select * from noticias where id_noticia = $cod";
							$datos = mysqli_query($con, $consulta);
							$fila = mysqli_fetch_array($datos, MYSQLI_ASSOC);

							echo "<div class='row'>";
								echo "<div class='col-md-6 col-md-offset-3'>";
									echo "<img src='../noticias/$fila[imagen]' class='img-responsive' alt='Responsive image'>";

									echo "<h2> $fila[titulo] </h2>";
								echo "</div>";
							echo"</div>";

							echo "<div class='row'>";
								echo "<div class='col-md-6 col-md-offset-2 text-justify'>";
									echo " $fila[contenido]";
								echo "</div>";
							echo"</div>";

							mysqli_close($con);
						}

					?>


			
		</div>
	</div> <!-- /empresa -->
	
	
	
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