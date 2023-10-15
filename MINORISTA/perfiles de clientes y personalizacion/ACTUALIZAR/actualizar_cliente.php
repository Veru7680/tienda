<?php
    include "../../../conexion.php";
    $query=mysqli_query($mysqli_link,"SELECT idusuario, Nombre FROM usuarios");
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <link rel="stylesheet" href="../../css/estilo1.css">
</head>
<body>
    <form action="ACTUALI_CLIENTE.php" method="post" class="form">
        <h2 class="form_tittle">ACTUALIZAR PERFIL</h2>
        <div class="form_container">
            <div class="form_group">
                <select name="ID_actualizar" class="form_input">
                <?php 
                    while($datos = mysqli_fetch_array($query))
                {
                ?>
                <option value="<?php echo $datos['idusuario']?>"> <?php echo $datos['idusuario']." ".$datos['Nombre']?> </option>
                <?php
                }
                ?> 
                </select>
            </div>
            <br>
            <div class="form_group">
                <input name="Nombre" type="text" id="Nombre" class="form_input" placeholder=" ">
                <label for="name" class="form_label">Nuevo Nombre</label>
                <span class="form_line"></span>
            </div>
            <div class="form_group">
                <input name="Correo" type="email" id="stock" class="form_input" placeholder="ejemplo@gmail.cpm">
                <label for="stock" class="form_label">Nuevo Correo</label>
                <span class="form_line"></span>
            </div>
            </div>
            <br>
            <br>
            <input type="submit" class="form_submit" value="Entrar">
        </div>
    </form>
</body>
</html>