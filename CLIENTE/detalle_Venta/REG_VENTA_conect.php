<?php
function insertarVenta(){
    $Nombre = $_POST['NombreCliente'];
    $Fecha = $_POST['Fecha'];
    $MF = $_POST['Monto_Final'];
    $Descuento = $_POST['Descuento'];

    include "../conexion.php";
    //INSERT INTO `usuarios` (`Idusr`, `Nombre`, `Clave`, `Fecha`) VALUES (NULL, 'ronald', '123456', '2023-08-01');
    $insert_query = "INSERT INTO `venta`(`Fecha`,`Monto_Final`,`Descuento`, `Nombre`) 
    VALUES ('". mysqli_real_escape_string($mysqli_link, $Fecha)."','".mysqli_real_escape_string($mysqli_link, $MF)."','".mysqli_real_escape_string($mysqli_link, $Descuento)."','".mysqli_real_escape_string($mysqli_link, $Nombre) ."')";
    
    // run the insert query 
    If (mysqli_query($mysqli_link, $insert_query)) {
        echo 'Se ha insertado correctamente.';
    }
    
    // close the db connection 
    mysqli_close($mysqli_link);
}
//Verifica si se uso el metodo POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    insertarVenta(); // Llama a la función para insertar los datos en la base de datos
}
?>