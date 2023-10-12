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
	<title>Menù Lateral con Css</title>
	<link rel="stylesheet" href="fondo_cliente.css">
</head>
<body>
	<header class="header">
		<div class="container">
		<div class="btn-menu">
			<label for="btn-menu">☰</label>
		
		</div>
		
			<div class="logo">
				<h1>CATALOGO</h1>
			</div>
		

			<nav class="menu">
				<a href="index_cliente.html">Inicio</a>
				<a href="../Login_Clientes/registrarse_cliente.php">Registrarse</a>
				<a href="index1.php?logout='1'">Cerrar secion</a>
			</nav>
		</div>
	</header>
	<div class="capa"></div>
<!--	--------------->
<input type="checkbox" id="btn-menu">
<div class="container-menu">
	<div class="cont-menu">
		<nav>
			<a href="#">CATEGORIA</a>
			<a target="todo" href="mostrar_producto.php">PRODUCTOS</a>
		
		</nav>
		<label for="btn-menu">✖️</label>
	</div>
</div>
<div class="slider">
    <br>
    <br>
    <br>
    
    <iframe name="todo" class="todo" src="" frameborder="0" ></iframe>
  
  </div>
</body>
</html>