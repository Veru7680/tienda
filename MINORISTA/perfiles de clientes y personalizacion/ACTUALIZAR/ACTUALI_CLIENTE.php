<?php
require "../../../conexion.php";

$ID = $_POST["ID_actualizar"];

$nombre = mysqli_real_escape_string($mysqli_link, $_POST["Nombre"]);
$correo = mysqli_real_escape_string($mysqli_link, $_POST["Correo"]);
if ($nombre && $correo and $ID != "") {
    $update_query = "UPDATE usuarios SET Nombre='$nombre', correo='$correo' WHERE idusuario='$ID'";
    
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
