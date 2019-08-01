<?php
	include "./funciones.php";
	comprueba_admin();
?>
<!DOCTYPE html>
	<html lang="es">
		<head>
			<?php
				head_interno();
			?>
		</head>

		<body>
			<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
					<?php
						pinta_logo();
					?>
					<div id= 'navbar' class="navbar-collapse collapse">
						<?php
							menu_administrador();
						?>
					</div><!--/.nav-collapse -->
					
				</div>

	
			

	<div id="empresa">
		<div class="container">

			<div class="row">
			  <div class="col-xs-12">
					<?php 
						if(isset($_GET['ini']))
						{
							mostrar_socios($_GET['ini']);
						}
						else
					mostrar_socios(); ?>
			    </div>
			</div>

			<div class="row">

				
				
			</div>
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


</script>
  </body>
</html>