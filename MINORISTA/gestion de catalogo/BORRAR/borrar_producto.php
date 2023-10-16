<?php
    require_once('../../../conexion.php');
    $query=mysqli_query($mysqli_link,"SELECT ID, Nombre FROM producto");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <link rel="stylesheet" href="../../../cssingreso/estil.css">
</head>
<body>
    <form action="BORR_PRODUCTO.php" method="post" class="form">
        <h2 class="form_tittle">Borrar PRODUCTO</h2>
        <div class="form_container">
            <div class="form_group">
                <select name="ID_borrar" class="form_input">
                <?php 
                    while($datos = mysqli_fetch_array($query))
                {
                ?>
                <option value="<?php echo $datos['ID']?>"> <?php echo $datos['ID']." ".$datos['Nombre']?> </option>
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
