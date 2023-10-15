<?php
    require_once('../../../conexion.php');
    $query=mysqli_query($mysqli_link,"SELECT idusuario, Nombre FROM usuarios");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <link rel="stylesheet" href="../../css/estilo1.css">
</head>
<body>
    <form action="BORR_Cliente.php" method="post" class="form">
        <h2 class="form_tittle">Borrar PRODUCTO</h2>
        <div class="form_container">
            <div class="form_group">
                <select name="ID_borrar" class="form_input">
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
            <br>
            <input type="submit" class="form_submit" value="Borrar">
        </div>
    </form>
</body>
</html>
