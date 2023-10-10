<?php
$mysqli = mysqli_connect("localhost", "root", "", "imagen");

if (mysqli_connect_errno()) {
    printf("MySQL connection failed with the error: %s", mysqli_connect_error());
    exit;
}

if (isset($_POST['ID_borrar'])) {
    $idBorrar = $_POST['ID_borrar'];

    $delete_query = "DELETE FROM categoria WHERE ID = '" . mysqli_real_escape_string($mysqli, $idBorrar) . "'";

    if (mysqli_query($mysqli, $delete_query)) {
        echo 'Categoria borrado correctamente.';
    } else {
        echo 'Error al borrar el categoria: ' . mysqli_error($mysqli);
    }
}

// Cerrar la conexión a la base de datos
mysqli_close($mysqli);
?>