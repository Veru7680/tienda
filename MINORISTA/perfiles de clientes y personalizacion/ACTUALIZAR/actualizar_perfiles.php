<?php
    include "../../../conexion.php";
    $query=mysqli_query($mysqli_link,"SELECT ID, Nombre FROM producto");
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <link rel="stylesheet" href="../../css/estilo1.css">
</head>
<body>
    <form action="ACTUALI_PRODUCTO.php" method="post" class="form">
        <h2 class="form_tittle">ACTUALIZAR PERFIL</h2>
        <div class="form_container">
            <div class="form_group">
                <select name="ID_actualizar" class="form_input">
                <?php 
                    while($datos = mysqli_fetch_array($query))
                {
                ?>
                <option value="<?php echo $datos['ID']?>"> <?php echo $datos['Nombre']?> </option>
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
                <input name="precio" type="number" id="precio" class="form_input" placeholder=" ">
                <label for="precio" class="form_label">Nuevo precio</label>
                <span class="form_line"></span>
            </div>
            <div class="form_group">
                <input name="stock" type="number" id="stock" class="form_input" placeholder=" ">
                <label for="stock" class="form_label">Nuevo Stock</label>
                <span class="form_line"></span>
            </div>
            <div class="form_group">
                <input name="IdCategoria" type="number" id="IdCategoria" class="form_input" placeholder=" ">
                <label for="IdCategoria" class="form_label">Nueva Id-Categoria</label>
                <span class="form_line"></span>
            </div>
            <br>
            <br>
            <input type="submit" class="form_submit" value="Entrar">
        </div>
    </form>
</body>
</html>