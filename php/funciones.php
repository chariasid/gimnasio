<?php 

function conectar ()
{
	$con = mysqli_connect('localhost', 'root', '', 'gimnasio');
	mysqli_set_charset($con, 'utf8');
	return $con;
}


function actividades_inicio()
{
	echo "<div class='row'>
			  <div class='col-xs-12'>
					<h2 class='sectionTitle'>NUESTRAS ACTIVIDADES</h2>
			    </div>
			</div>";

	$con = conectar();
	$consulta = "select * from actividad";
	$datos = mysqli_query($con, $consulta);

	echo "<div class='row'>";

	while($fila = mysqli_fetch_array($datos, MYSQLI_ASSOC))
	{
		echo "<div class='col-sm-3 text-center'>
					<img src='./imagenes/actividades/$fila[foto]' width='176' height='117'>
					<h3>$fila[nombre]</h3>
					<p align='justify'>".substr($fila['descripcion'], 0, 300)."
					</p>
				</div>";
	}
	echo "</div>";
}
function monitores_inicio()
{


	$con = conectar();
	$consulta = "select * from monitor";
	$datos = mysqli_query($con, $consulta);

	echo "<div class='row'>";

	while($fila = mysqli_fetch_array($datos, MYSQLI_ASSOC))
	{
		echo "<div class='col-sm-4 text-center'>
					<img src='./imagenes/monitores/$fila[foto]' width='176' height='176' class='img-circle'>
					<h3>$fila[nombre]</h3>
					
				</div>";
	}
	echo "</div>";
}


function mostrar_socios($inicio=0)
{
	echo "<h2 class='sectionTitle'>SOCIOS</h2>";
	$con = conectar();

	$fin=$inicio+6;

	$consulta = "select count(*) tot from socio ";
	$datos = mysqli_query($con, $consulta);
	$fila = mysqli_fetch_array($datos);
	$total = $fila['tot'];


	$consulta = "select * from socio order by num_socio asc limit $inicio, 6";
	$datos = mysqli_query($con, $consulta);
	echo "<div class='table-responsive'>";
	echo "<table class='table table-striped'>";
	echo "<tr><TD></td> <td> SOCIO </td> <td> DNI </td><td> NOMBRE </td> <td> APELLIDOS </td> 
	<td> EMAIL </td> <td> TELÉFONO </td><td> FECHA DE NACIMIENTO 
	</td><td> USUARIO </td><td> CONTRASEÑA </td><td>  </td><td>  </td></tr>";
	while ($fila = mysqli_fetch_array($datos, MYSQLI_ASSOC))
	{	
		echo "<tr><td VALIGN='middle'><img src='../imagenes/socios/$fila[foto]' class='img-responsive' alt=''>";
		echo "<td style='vertical-align:middle;'>$fila[num_socio]</td>";	
		echo "<td style='vertical-align:middle;'>$fila[dni]</td>";	
		echo "<td style='vertical-align:middle;'>$fila[nombre]</td>";
		echo "<td style='vertical-align:middle;'>$fila[apellidos]</td>";
		echo "<td style='vertical-align:middle;'>$fila[email]</td>";
		echo "<td style='vertical-align:middle;'>$fila[telefono]</td>";
		echo "<td style='vertical-align:middle;'>$fila[fecha_nac]</td>";
		echo "<td style='vertical-align:middle;'>$fila[usuario]</td>";
		echo "<td style='vertical-align:middle;'>$fila[contraseña]</td>";
		echo "<td style='vertical-align:middle;'><a href='modificarsocio.php?id=$fila[num_socio]'>MODIFICAR</a></td>";
		echo "</tr>";
		
	}	
	echo "</table>";
	echo "</div>";
	if($inicio>0 and $fin<$total)
	{
		$antes=$inicio-6;
		$despues = $inicio+6;
		echo "<div><span style='float:right'><a href='socios.php?ini=$despues'>  SIGUIENTE >>  </a></span><a href='socios.php?ini=$antes'>  << ANTERIOR  </a></div>";
	}
	if($inicio == 0)
	{
		$despues = $inicio+6;
		echo "<div><span style='float:right'><a href='socios.php?ini=$despues'>  SIGUIENTE >>  </a></span></div>";
	}
	if($inicio>0 and $fin>=$total)
	{
		$antes=$inicio-6;
		echo "<div><a href='socios.php?ini=$antes'>  << ANTERIOR  </a></div>";
	}
	mysqli_close($con);
}

function mostrar_monitores($inicio=0)
{
	echo "<h2 class='sectionTitle'>SOCIOS</h2>";
	$con = conectar();

	$fin=$inicio+5;

	$consulta = "select count(*) tot from monitor ";
	$datos = mysqli_query($con, $consulta);
	$fila = mysqli_fetch_array($datos);
	$total = $fila['tot'];


	$consulta = "select * from monitor order by apellidos asc limit $inicio, 5";
	$datos = mysqli_query($con, $consulta);
	echo "<div class='table-responsive'>";
	echo "<table class='table table-striped'>";
	echo "<tr><TD></td> <td> DNI </td><td> NOMBRE </td> <td> APELLIDOS </td> 
	<td> EMAIL </td> <td> USUARIO </td><td> CONTRASEÑA </td><td>  </td><td>  </td></tr>";
	while ($fila = mysqli_fetch_array($datos, MYSQLI_ASSOC))
	{	
		echo "<tr><td VALIGN='middle'><img src='../imagenes/monitores/$fila[foto]' class='img-responsive' width='100px' height='100px'>";
			
		echo "<td style='vertical-align:middle;'>$fila[dni]</td>";	
		echo "<td style='vertical-align:middle;'>$fila[nombre]</td>";
		echo "<td style='vertical-align:middle;'>$fila[apellidos]</td>";
		echo "<td style='vertical-align:middle;'>$fila[email]</td>";
		
		
		echo "<td style='vertical-align:middle;'>$fila[usuario]</td>";
		echo "<td style='vertical-align:middle;'>$fila[contraseña]</td>";
		echo "<td style='vertical-align:middle;'><a href='modificarmonitor.php?id=$fila[dni]'>MODIFICAR</a></td>";
		echo "</tr>";
		
	}	
	echo "</table>";
	echo "</div>";
	if($inicio>0 and $fin<$total)
	{
		$antes=$inicio-5;
		$despues = $inicio+5;
		echo "<div><span style='float:right'><a href='monitores.php?ini=$despues'>  SIGUIENTE >>  </a></span><a href='monitores.php?ini=$antes'>  << ANTERIOR  </a></div>";
	}
	if($inicio == 0)
	{
		$despues = $inicio+5;
		echo "<div><span style='float:right'><a href='monitores.php?ini=$despues'>  SIGUIENTE >>  </a></span></div>";
	}
	if($inicio>0 and $fin>=$total)
	{
		$antes=$inicio-5;
		echo "<div><a href='monitores.php?ini=$antes'>  << ANTERIOR  </a></div>";
	}
	mysqli_close($con);
}
function mostrar_actividades($inicio=0)
{
	echo "<h2 class='sectionTitle'>ACTIVIDADES</h2>";
	$con = conectar();

	$fin=$inicio+5;

	$consulta = "select count(*) tot from actividad ";
	$datos = mysqli_query($con, $consulta);
	$fila = mysqli_fetch_array($datos);
	$total = $fila['tot'];


	$consulta = "select * from actividad order by cod_actividad asc limit $inicio, 5";
	$datos = mysqli_query($con, $consulta);
	echo "<div class='table-responsive'>";
	echo "<table class='table table-striped'>";
	echo "<tr><TD></td> <td> NOMBRE </td> <td> DESCRIPCIÓN </td> 
	<td> PRECIO </td><td>  </td><td>  </td></tr>";
	while ($fila = mysqli_fetch_array($datos, MYSQLI_ASSOC))
	{	
		echo "<tr><td VALIGN='middle'><img src='../imagenes/actividades/$fila[foto]' class='img-responsive' width='500px' height='500px'>";
			
		echo "<td style='vertical-align:middle;'>$fila[nombre]</td>";
		echo "<td style='vertical-align:middle;'>$fila[descripcion]</td>";
		echo "<td style='vertical-align:middle;'>$fila[precio]</td>";
		
		echo "<td style='vertical-align:middle;'><a href='modificaractividad.php?id=$fila[cod_actividad]'>MODIFICAR</a></td>";
		echo "</tr>";
		
	}	
	echo "</table>";
	echo "</div>";
	if($inicio>0 and $fin<$total)
	{
		$antes=$inicio-5;
		$despues = $inicio+5;
		echo "<div><span style='float:right'><a href='actividades.php?ini=$despues'>  SIGUIENTE >>  </a></span><a href='actividades.php?ini=$antes'>  << ANTERIOR  </a></div>";
	}
	if($inicio == 0)
	{
		$despues = $inicio+5;
		echo "<div><span style='float:right'><a href='actividades.php?ini=$despues'>  SIGUIENTE >>  </a></span></div>";
	}
	if($inicio>0 and $fin>=$total)
	{
		$antes=$inicio-5;
		echo "<div><a href='actividades.php?ini=$antes'>  << ANTERIOR  </a></div>";
	}
	mysqli_close($con);
}
function mostrar_clientes_cliente($nombre)
{
	echo "<h2 class='sectionTitle'>CLIENTES</h2>";
	$con = conectar();
	$consulta = "select * from clientes where nombre_dueño = '$nombre' order by id_cliente asc";
	$datos = mysqli_query($con, $consulta);
	echo "<div class='table-responsive'>";
	echo "<table class='table table-striped'>";
	echo "<tr> <td> CLIENTE </td> <td> NOMBRE </td> <td> TIPO DE ANIMAL </td> <td> EDAD </td> <td> NOMBRE DUEÑO </td><td> TELÉFONO DUEÑO </td><td>  </td><td>  </td></tr>";
	while ($fila = mysqli_fetch_array($datos, MYSQLI_ASSOC))
	{	
		echo "<tr><td VALIGN='middle'><img src='../clientes/$fila[foto]' class='img-responsive' alt=''>";
		echo "<td style='vertical-align:middle;'>$fila[nombre]</td>";
		echo "<td style='vertical-align:middle;'>$fila[tipo_animal]</td>";
		echo "<td style='vertical-align:middle;'>$fila[edad]</td>";
		echo "<td style='vertical-align:middle;'>$fila[nombre_dueño]</td>";
		echo "<td style='vertical-align:middle;'>$fila[tlf_dueño]</td>";
		echo "</tr>";
		
	}	
	echo "</table>";
	echo "</div>";
	mysqli_close($con);
}

function mostrar_noticias()
{
	echo "<BR><BR><BR><BR><BR><h2 class='sectionTitle'>NOTICIAS</h2>";
	$con = conectar();
	$consulta = "select * from noticias order by id_noticia asc";
	$datos = mysqli_query($con, $consulta);
	echo "<div class='table-responsive'>";
	echo "<table class='table table-striped'>";
	echo "<tr> <td>  </td> <td> TITULAR </td> <td> NOTICIA </td> </tr>";
	while ($fila = mysqli_fetch_array($datos, MYSQLI_ASSOC))
	{	
		echo "<tr><td VALIGN='middle'><img src='../noticias/$fila[imagen]' class='img-responsive' alt=''>";
		echo "<td VALIGN='middle'>$fila[titulo]</td>";
		echo "<td VALIGN='middle'>$fila[contenido]</td>";
		echo "</tr>";
		
	}	
	echo "</table>";
	echo "</div>";
	mysqli_close($con);
}

function mostrar_productos()
{
	
	$con = conectar();
	$consulta = "select * from productos order by id_producto asc";
	$datos = mysqli_query($con, $consulta);
	echo "<div class='table-responsive'>";
	echo "<BR><BR><BR><BR><BR><h2 class='sectionTitle'>PRODUCTOS</h2>";
	echo "<table class='table table-striped'>";
	echo "<tr> <td> NOMBRE </td> <td> PRECIO </td> </tr>";
	while ($fila = mysqli_fetch_array($datos, MYSQLI_ASSOC))
	{	
		echo "<tr>";
		echo "<td VALIGN='middle'>$fila[nombre]</td>";
		echo "<td VALIGN='middle'>$fila[precio]€</td>";
		echo "<td VALIGN='middle'><a href='modificarproducto.php?id=$fila[id_producto]'>MODIFICAR</a></td>";
		echo "<td VALIGN='middle'><a href='eliminarproducto.php?id=$fila[id_producto]'>BORRAR</a></td>";
		echo "</tr>";
		
	}	
	echo "</table>";
	echo "</div>";
	mysqli_close($con);
}
function mostrar_productos_cliente()
{
	
	$con = conectar();
	$consulta = "select * from productos order by id_producto asc";
	$datos = mysqli_query($con, $consulta);
	echo "<div class='table-responsive'>";
	echo "<BR><BR><BR><BR><BR><h2 class='sectionTitle'>PRODUCTOS</h2>";
	echo "<table class='table table-striped'>";
	echo "<tr> <td> NOMBRE </td> <td> PRECIO </td> </tr>";
	while ($fila = mysqli_fetch_array($datos, MYSQLI_ASSOC))
	{	
		echo "<tr>";
		echo "<td VALIGN='middle'>$fila[nombre]</td>";
		echo "<td VALIGN='middle'>$fila[precio]€</td>";
		echo "</tr>";
		
	}	
	echo "</table>";
	echo "</div>";
	mysqli_close($con);
}

function mostrar_productos_index()
{
	
	$con = conectar();
	$consulta = "select * from productos order by id_producto asc";
	$datos = mysqli_query($con, $consulta);
	echo "<div class='table-responsive'>";
	echo "<BR><BR><BR><BR><BR><h2 class='sectionTitle'>PRODUCTOS</h2>";
	echo "<table class='table table-striped'>";
	echo "<tr> <td> NOMBRE </td> <td> PRECIO </td> </tr>";
	while ($fila = mysqli_fetch_array($datos, MYSQLI_ASSOC))
	{	
		echo "<tr>";
		echo "<td VALIGN='middle'>$fila[nombre]</td>";
		echo "<td VALIGN='middle'>$fila[precio]€</td>";
		echo "</tr>";
		
	}	
	echo "</table>";
	echo "</div>";
	mysqli_close($con);
}



function mostrar_servicios()
{
	echo "<BR><BR><BR><BR><BR><h2 class='sectionTitle'>SERVICIOS</h2>";
	$con = conectar();
	$consulta = "select * from servicios order by id_servicio asc";
	$datos = mysqli_query($con, $consulta);
	echo "<div class='table-responsive'>";
	echo "<table class='table table-striped'>";
	echo "<tr> <td> NOMBRE </td> <td> DURACION </td> <td> PRECIO </td> </tr>";
	while ($fila = mysqli_fetch_array($datos, MYSQLI_ASSOC))
	{	
		echo "<tr>";
		echo "<td VALIGN='middle'>$fila[descripcion]</td>";
		echo "<td VALIGN='middle'>$fila[duracion] minutos</td>";
		echo "<td VALIGN='middle'>$fila[precio]€</td>";
		echo "<td VALIGN='middle'><a href='modificarservicio.php?id=$fila[id_servicio]'>MODIFICAR</a></td>";
		echo "</tr>";
		
	}	
	echo "</table>";
	echo "</div>";
	mysqli_close($con);
}
function mostrar_servicios_index()
{
	echo "<BR><BR><BR><BR><BR><h2 class='sectionTitle'>SERVICIOS</h2>";
	$con = conectar();
	$consulta = "select * from servicios order by id_servicio asc";
	$datos = mysqli_query($con, $consulta);
	echo "<div class='table-responsive'>";
	echo "<table class='table table-striped'>";
	echo "<tr> <td> NOMBRE </td> <td> DURACION </td> <td> PRECIO </td> </tr>";
	while ($fila = mysqli_fetch_array($datos, MYSQLI_ASSOC))
	{	
		echo "<tr>";
		echo "<td VALIGN='middle'>$fila[descripcion]</td>";
		echo "<td VALIGN='middle'>$fila[duracion] minutos</td>";
		echo "<td VALIGN='middle'>$fila[precio]€</td>";
		echo "</tr>";
		
	}	
	echo "</table>";
	echo "</div>";
	mysqli_close($con);
}

function mostrar_testimonios()
{
	
	$con = conectar();
	$consulta = "select * from testimonios order by id_testimonio asc";
	$datos = mysqli_query($con, $consulta);
	echo "<div class='table-responsive'>";
	echo "<BR><BR><BR><BR><BR><h2 class='sectionTitle'>TESTIMONIOS</h2>";
	echo "<table class='table table-striped'>";
	echo "<tr> <td class='col-lg-8'> TESTIMONIO </td> <td class='col-lg-2'> AUTOR </td><td class='col-lg-2'> FECHA </td> </tr>";
	while ($fila = mysqli_fetch_array($datos, MYSQLI_ASSOC))
	{	
		echo "<tr>";
		echo "<td VALIGN='middle'>$fila[contenido]</td>";
		echo "<td VALIGN='middle'>$fila[autor]</td>";
		$f = modifica_fecha($fila['fecha']);
		echo "<td VALIGN='middle'>$f</td>";
		echo "</tr>";
		
	}	
	echo "</table>";
	echo "</div>";
	mysqli_close($con);
}

function mostrar_citas()
{
	echo "<BR><BR><BR><BR><BR><h2 class='sectionTitle'>CITAS</h2>";
	$con = conectar();
	$consulta = "select c.nombre, s.descripcion, fecha, hora, c.id_cliente, s.id_servicio from clientes c, servicios s, citas ci 
	where c.id_cliente=ci.id_cliente and s.id_servicio=ci.id_servicio order by fecha desc";
	$datos = mysqli_query($con, $consulta);
	echo "<div class='table-responsive'>";
	echo "<table class='table table-striped'>";
	echo "<tr> <td> CLIENTE </td> <td> SERVICIO </td><td> FECHA </td> <td> HORA </td></tr>";
	while ($fila = mysqli_fetch_array($datos, MYSQLI_ASSOC))
	{
		$hoy = time();
		echo "<tr>";
		echo "<td VALIGN='middle'>$fila[nombre]</td>";
		echo "<td VALIGN='middle'>$fila[descripcion]</td>";
		$fecha = modifica_fecha($fila['fecha']);
		echo "<td VALIGN='middle'>$fecha</td>";
		echo "<td VALIGN='middle'>$fila[hora]</td>";
		if(strtotime($fila['fecha']) > $hoy)
		{
			echo "<td VALIGN='middle'><a href='eliminarcita.php?id_c=$fila[id_cliente]&id_s=$fila[id_servicio]&hora=$fila[hora]&dia=$fila[fecha]'>BORRAR</a></td>";
		}
		else
		{
			echo "<td VALIGN='middle'>BORRAR</td>";
		}
		echo "</tr>";
		
	}	
	echo "</table>";
	echo "</div>";
	mysqli_close($con);
}
function mostrar_citas_cliente($nombre)
{
	echo "<BR><BR><BR><BR><BR><h2 class='sectionTitle'>CITAS</h2>";
	$con = conectar();
	$consulta = "select c.nombre, s.descripcion, fecha, hora, c.id_cliente, s.id_servicio from clientes c, servicios s, citas ci 
	where c.id_cliente=ci.id_cliente and s.id_servicio=ci.id_servicio and nombre_dueño = '$nombre' order by fecha desc";
	$datos = mysqli_query($con, $consulta);
	echo "<div class='table-responsive'>";
	echo "<table class='table table-striped'>";
	echo "<tr> <td> CLIENTE </td> <td> SERVICIO </td><td> FECHA </td> <td> HORA </td></tr>";
	while ($fila = mysqli_fetch_array($datos, MYSQLI_ASSOC))
	{
		$hoy = time();
		echo "<tr>";
		echo "<td VALIGN='middle'>$fila[nombre]</td>";
		echo "<td VALIGN='middle'>$fila[descripcion]</td>";
		$fecha = modifica_fecha($fila['fecha']);
		echo "<td VALIGN='middle'>$fecha</td>";
		echo "<td VALIGN='middle'>$fila[hora]</td>";
		
		echo "</tr>";
		
	}	
	echo "</table>";
	echo "</div>";
	mysqli_close($con);
}

function modifica_fecha ($fecha)
{
	$mkfecha = strtotime($fecha);
	$fecha_bien = date('d-m-Y', $mkfecha);
	return $fecha_bien;
}

function comprueba_cliente()
{	
	session_start();
	if(isset($_SESSION['user']))
	{
		if($_SESSION['user']=='admin')
		{
			header('location:accede.php');
		}

	}
	else
	{
		if(isset($_COOKIE['sesion']))
		{
			session_decode($_COOKIE['sesion']);
			if($_SESSION['user']=='admin')
			{
				header('location:accede.php');
			}
		}
		else
		{
			header('location:accede.php');
		}
	}

}
function comprueba_admin ()
{
	session_start();
	if(isset($_SESSION['user']))
	{
		if($_SESSION['user']!='admin')
		{
			header('location:accede.php');
		}

	}
	else
	{
		if(isset($_COOKIE['sesion']))
		{
			session_decode($_COOKIE['sesion']);
			if($_SESSION['user']!='admin')
			{
				header('location:accede.php');
			}
		}
		else
		{
			header('location:accede.php');
		}
	}

}

function pinta_logo($nivel=0)
{
	if($nivel == 1)
	{
		echo "<a class='navbar-brand' href='#cabecera'>
						GIMNASIO 
			<span class='title'> V0</span>
                        ";
	}
	else
	{
		echo "<a class='navbar-brand' href='../index.php'>
						GIMNASIO V0
            </a>";
	}
}

function head_interno()
{
	echo "<meta charset='utf-8'>
			<meta http-equiv='X-UA-Compatible' content='IE=edge'>
			<meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no'>
			<meta name='description' content='A Bootstrap based app landing page template'>
			<meta name='author' content=''>
			<link rel='shortcut icon' href='assets/ico/favicon.ico'>

			<title>Gimnasio</title>
			 <link href='https://fonts.googleapis.com/css?family=Dosis:400,600,700' rel='stylesheet' type='text/css'>	
			<link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
			<!-- Bootstrap core CSS -->
			<link href='../css/bootstrap.min.css' rel='stylesheet'>

			<!-- Custom styles for this template -->
			<link href='../css/custom-back.css' rel='stylesheet'>
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
				
			</style>";
}

function menu_administrador()
{
	echo "<ul class='nav navbar-nav'>
							<li > 
							 <a href='socios.php' > SOCIOS  </a>															
							</li>	
							<li > 
							 <a href='monitores.php' > MONITORES  </a>															
							</li>
							<li > 
							 <a href='actividades.php' > ACTIVIDADES  </a>															
							</li>
							<li > 
							 <a href='clases.php' > CLASES  </a>															
							</li>
							<li > 
							 <a href='recepcionistas.php' > RECEPCIONISTAS  </a>															
							</li>
							<li > 
							 <a href='aulas.php' > AULAS  </a>															
							</li>
							<li > 
							 <a href='salir.php' > CERRAR SESIÓN 'ADMINISTRADOR'  </a>															
							</li>
								
							
						</ul>
						";
}


function footer()
{
		echo "<footer>
		<div class='col-xs-4 text-center'>
		<a class='navbar-brand' href='#cabecera'>
						GIMNASIO<span class='title'> V0</span>
                        
						</a>
		</div>
		<div class='container'>
			<div class='row'>
				<div class='col-xs-4 text-left'>
					<p>
						Actividades <br>
						Monitores  <br>
						Contacto <br>
						Accede
					
					</p>
				</div>
				<div class='col-xs-4 text-center'>
					<p class='social'>
						<a href='https://www.facebook.com/bootstrapbay'>
							<span class='fa-stack fa-lg'>
								<i class='fa fa-circle fa-stack-2x'></i>
								<i class='fa fa-facebook fa-stack-1x fa-inverse'></i>
							</span>
						</a>
						<a href='https://twitter.com/bootstrapbay'>
							<span class='fa-stack fa-lg'>
								<i class='fa fa-circle fa-stack-2x'></i>
								<i class='fa fa-twitter fa-stack-1x fa-inverse'></i>
							</span>
						</a>
						<a href='https://plus.google.com/+BootstrapbayThemes'>
							<span class='fa-stack fa-lg'>
								<i class='fa fa-circle fa-stack-2x'></i>
								<i class='fa fa-google-plus fa-stack-1x fa-inverse'></i>
							</span>
						</a>
						<a href='http://www.youtube.com/user/bootstrapbayofficial'>
							<span class='fa-stack fa-lg'>
								<i class='fa fa-circle fa-stack-2x'></i>
								<i class='fa fa-youtube fa-stack-1x fa-inverse'></i>
							</span>
						</a>
					</p>
				</div>
			</div>
		</div>
		</footer>";
}
?>


















