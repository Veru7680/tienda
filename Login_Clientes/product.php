<!DOCTYPE html>
<html>
<body>

<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 
include "../conexion.php";
// connect to the database

if ($mysqli_link->connect_error) {
    die("Connection failed: " . $mysqli_link->connect_error);
}



$sql = "SELECT idusuario, Nombre, Correo FROM usuarios";
$result = $mysqli_link->query($sql);


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        print "<br> idusuario: ". $row["idusuario"]. "<br> - Nombre: ". $row["Nombre"]. "<br> - Correo: " . $row["Correo"] . "<br>";

     
    }
} else {
    print "0 results";
}



$mysqli_link->close();   
        ?> 



</body>
</html>