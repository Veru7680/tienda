<?php 
  session_start(); 

  if (!isset($_SESSION['Nombre'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: ../Login_Clientes/continuar_cliente.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['Nombre']);
  	header("location: ../Login_Clientes/continuar_cliente.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="header">
	<h2>Home Page</h2>
</div>
	Welcome to my project page	
<div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['Nombre'])) : ?>
    	<p>Welcome <strong><?php echo $_SESSION['Nombre']; ?></strong></p>
    	<p> <a href="catalogo.php?logout='1'" style="color: red;">logout</a> </p>
    <?php endif ?>
</div>

</body>
</html>