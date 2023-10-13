<?php 
  session_start(); 

  if (!isset($_SESSION['Nombre'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: ../Login_minoristas/continuar_minorista.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['Nombre']);
  	header("location: ../Login_minoristas/continuar_minorista.php");
  }
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Menú Desplegable</title>
	<link rel="stylesheet" href="fondo2.css">
</head>

<body>
		<!-- logged in user information -->
		<?php  if (isset($_SESSION['Nombre'])) : ?>
			<p>Bienvenido <strong><?php echo $_SESSION['Nombre']; ?></strong></p>
			<p> <a href="index1.php?logout='1'" style="color: red;">logout</a> </p>
		<?php endif ?>
	</div>

	<div class="container">
	
				
		<div class="tutorial">

	<nav>
		<ul class="menu-horizontal">
			
			<li>
				<a href="#">GESTION DE VENTAS Y CATALOGO</a>
				<ul class="menu-vertical">
                    <li><a href="gestion de ventas y catalogo/REGISTRAR/registrar_inventario_producto.php" target="derecha">REGISTAR INVENTARIO</a></li>
					<li><a href="gestion de ventas y catalogo/ACTUALZAR/actualizar_producto.php" target="derecha">ACTUALIZAR INVENTARIO</a></li>
                    <li><a href="gestion de ventas y catalogo/BORRAR/borrar_producto.php" target="derecha">BORRAR INVENTARIO</a></li>
            

					<li><a href="gestion de ventas y catalogo/MOSTRAR/mostrar_inventario_productos.php" target="izquierda">MOSTRAR CATALOGO</a></li>
				</ul>
			</li>
			
			<li>
				<a href="#">PERFILES DE CLIENTES Y PERSONALIZACION</a>
				<ul class="menu-vertical">
                    <li><a href="../Login_Clientes/registrarse_cliente.php" target="derecha">REGISTAR CLIENTE</a></li>
					<li><a href="perfiles de clientes y personalizacion/ACTUALIZAR/actualizar_cliente.html" target="derecha">ACTUALIZAR CLIENTE</a></li>
                    <li><a href="perfiles de clientes y personalizacion/BORRAR/borrar_producto.php" target="derecha">BORRAR CLIENTE</a></li>
            

					<li><a href="perfiles de clientes y personalizacion/MOSTRAR/mostrar_CLIENTE.php" target="izquierda">MOSTRAR CLIENTE</a></li>
                </ul>
			</li>

            <li>
				<a href="#">PROCESAMIENTO Y CUMPLIMIENTO DE PEDIDO</a>
				<ul class="menu-vertical">
					
					<li><a href="nada.html" target="izquierda">LISTA DE PEDIDOS </a></li>

                </ul>
			</li>

            
		</ul>
	</nav>


	<div class="slider">
        <iframe name="derecha" class="derecha" src="" frameborder="0" ></iframe>
		<iframe name="izquierda" class="izquierda" src="" frameborder="0" ></iframe>
      </div>

</div>
</div>

<video autoplay muted loop class="video-fondo">
    <source src="tecno.mp4" type="video/mp4">
	no soporta
	</video>
</body>
</html>