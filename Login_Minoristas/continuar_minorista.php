<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="escudo.png" type="image/x-icon" /> 
    <link rel="stylesheet" href="../cssingreso/estilo.css">
    <title>FORMULARIO</title>
</head>
<body>
    <form action="continuar_minorista.php" method="post">
    <section class="form-register">
        <h4>Entrar Minorista</h4>
        <?php include('errors.php'); ?>
    <input class="controls" type="text" name="Nombre" id="" placeholder="ingrese su nombre" >
    <input class="controls" type="password" name="Clave" id="" placeholder="ingrese clave" >
    <input class="botons" name="login_user" type="submit" value="registrar">
    <p>
    No te registraste? <a href="registrarse_minorista.php">Registrase-Sing Up</a>
    </p>
    <div class="slider">
        <iframe name="contenido-dinamico"  class="contenido-dinamico" src="" frameborder="0" ></iframe>
      </div>
    </section>
</form>
</body>
</html>