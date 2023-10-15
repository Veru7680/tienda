<?php
 require "../../../conexion.php";

$id = $_POST["ID_actualizar"];

$nombre = mysqli_real_escape_string($mysqli_link, $_POST["Nombre"]);
$precio = mysqli_real_escape_string($mysqli_link, $_POST["precio"]);
$stock = mysqli_real_escape_string($mysqli_link, $_POST["stock"]);
$IdCategoria = mysqli_real_escape_string($mysqli_link, $_POST["IdCategoria"]);
$foto = addslashes(file_get_contents($_FILES['foto']['tmp_name']));
if ($nombre && $precio && $stock &&$IdCategoria and $id != "") {
    $update_query = "UPDATE producto SET Nombre='$nombre', Precio='$precio', Stock='$stock', IdCategoria='$IdCategoria', foto='$foto' WHERE ID='$id'";
    
    if ($mysqli_link->query($update_query)) {
        echo 'Registro actualizado exitosamente.';
    } else {
        echo 'Error al actualizar el registro: ' . $mysqli_link->error;
    }

    $mysqli_link->close();
} else {
    // header("Location: interfaz.html");
    exit;
}
?>
