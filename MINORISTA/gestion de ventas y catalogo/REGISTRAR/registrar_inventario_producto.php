<?php
require_once('../../../conexion.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificar si se proporcionó un nombre
    if (empty($_POST['Nombre'])) {
        echo "Por favor, complete el formulario. El campo 'nombre' es obligatorio.";
    } else {
        $nombre = $_POST['Nombre'];
        $precio = $_POST['Precio']; // Nuevo campo Precio
        $stock = $_POST['Stock'];   // Nuevo campo Stock
        $idCategoria = $_POST['IdCategoria']; // Nuevo campo IdCategoria
        $descripcion = $_POST['Descripcion']; // Nuevo campo Descripcion
        $foto = addslashes(file_get_contents($_FILES['foto']['tmp_name']));

        $query = "INSERT INTO producto (Nombre, Precio, Stock, IdCategoria, Descripcion, foto) 
                  VALUES ('$nombre', '$precio', '$stock', '$idCategoria', '$descripcion', '$foto')";
        $resultado = $mysqli_link->query($query);

        if ($resultado) {
            echo "Se han insertado los datos.";
        } else {
            echo "No se han insertado los datos.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Formulario para Agregar Producto</title>
    <link rel="stylesheet" href="estil.css">
</head>
<body>
    <form method="POST" enctype="multipart/form-data">
        <label for="Nombre">Nombre:</label>
        <input name="Nombre" type="text" required>
        <br>

        <label for="Precio">Precio:</label>
        <input name="Precio" type="number" required>
        <br>

        <label for="Stock">Stock:</label>
        <input name="Stock" type="number" required>
        <br>

        <label for="IdCategoria">ID de Categoría:</label>
        <input name="IdCategoria" type="number" required>
        <br>

        <label for="Descripcion">Descripción:</label>
        <textarea name="Descripcion" required></textarea>
        <br>

        <label for="foto">Subir foto:</label>
        <input name="foto" type="file" required>
        <br>

        <input type="submit" name="guardar" value="Guardar">
        <button><a href="mostrar_inventario_productos.php">REVISAR LISTA</a></button>
    </form>
</body>
</html>
