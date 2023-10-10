<?php
 $Nombre= $_POST["Nombre"]; 
 $Correo= $_POST["Correo"] ;
 $Clave= $_POST["Clave"] ;
 $Fecha= $_POST["Fecha"] ;
$mysqli_link = mysqli_connect("localhost", "root", "", "tienda:3");
if (mysqli_connect_errno())
{
    printf("MySQL connection failed with the error: %s", mysqli_connect_error());
    exit;
}
//INSERT INTO `usuarios` (`Idusr`, `Nombre`, `Clave`, `Fecha`) VALUES (NULL, 'ronald', '123456', '2023-08-01');
$insert_query = "INSERT INTO `usuario`(`nombre`,`correo`,`clave`,`fecha`) 
VALUES ('". mysqli_real_escape_string($mysqli_link, $Nombre)."','".mysqli_real_escape_string($mysqli_link, $Correo)."','".mysqli_real_escape_string($mysqli_link, $Clave)."','".mysqli_real_escape_string($mysqli_link, $Fecha) ."')";
 
// run the insert query 
If (mysqli_query($mysqli_link, $insert_query)) {
    echo 'sea insertado correctamente.';
}
 
// close the db connection 
mysqli_close($mysqli_link);
?>