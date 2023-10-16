<?php include('serve2.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="escudo.png" type="image/x-icon" /> 
    <link rel="stylesheet" href="../cssingreso/registra.css">
    <title>FORMULARIO</title>
</head>
<body>
    <form action="registrar_cliente_desde_mino.php" method="post">
    <section class="form-register">
        <h4>Registrarse cliente</h4>
        <?php include('errors.php'); ?>
    <input class="controls" type="text" name="Nombre" id="" placeholder="ingrese su nombre de usuario" >
    <input class="controls" type="email" name="Correo" id="" placeholder="ingrese correo electronico" >  
    <div class="input-group">
  	  <label>Password</label>
  	  <input class="controls" type="password" id="" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input class="controls" type="password" id="" name="password_2">
  	</div>
    <input class="botons" type="submit" name="reg_user" value="registrar">
  
    <div class="slider">
        <iframe name="contenido-dinamico" class="contenido-dinamico" src="" frameborder="0" ></iframe>
      </div>
    </section>
</form>
</body>
</html>