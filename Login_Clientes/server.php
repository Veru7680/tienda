<?php
session_start();
include "../conexion.php";
// initializing variables
$username = "";
$Correo    = "";
$errors = array(); 

// connect to the database

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($mysqli_link , $_POST['Nombre']);
  $Correo = mysqli_real_escape_string($mysqli_link , $_POST['Correo']);
  $password_1 = mysqli_real_escape_string($mysqli_link , $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($mysqli_link , $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($Correo)) { array_push($errors, "Correo is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or Correo$Correo
  $user_check_query = "SELECT * FROM usuarios WHERE Nombre='$username' OR Correo='$Correo' LIMIT 1";
  $result = mysqli_query($mysqli_link , $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['Nombre'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['Correo'] === $Correo) {
      array_push($errors, "Correo already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO usuarios (Nombre, Correo, Clave) 
  			  VALUES('$username', '$Correo', '$password')";
  	mysqli_query($mysqli_link , $query);
  	$_SESSION['Nombre'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: ../CLIENTE/catalogo.php');
  }
}

// LOGIN USER
if (isset($_POST['login_user'])) {
  $Nombre = mysqli_real_escape_string($mysqli_link , $_POST['Nombre']);
  $password = mysqli_real_escape_string($mysqli_link , $_POST['Clave']);

  if (empty($Nombre)) {
  	array_push($errors, "Nombre is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM usuarios WHERE Nombre='$Nombre' AND Clave='$password'";
  	$results = mysqli_query($mysqli_link , $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['Nombre'] = $Nombre;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: ../CLIENTE/catalogo.php');
  	}else {
  		array_push($errors, "Wrong Nombre/password combination");
  	}
  }
}

?>