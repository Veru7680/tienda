<?php
require 'conexion.php';
if(isset($POST ["submit"])){
    $name -$_Post["name"];
    if($_FILES["foto"]["error"]===4){
        echo
       "<sript> alert('la imagen no existe') </script>"
        ;
    }
    else{
        $filename=$_FILES["foto"]["name"];
        $fileSize=$_FILES["foto"]["size"];
        $tmpname=$_FILES["foto"]["tmpName"];


        $validImageExtension=['jpg', 'jepg', 'png']
        $imageExtension= explode('_', $filename);

    }
}

















?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <from class="" action="" method="post>" >
    <div class="form_container">
            <div class="form_group">
            <div class="form_group">
                <input name="id" type="number" id="id" class="form_input" placeholder=" ">
                <label for="id" class="form_label">ID</label>
                <span class="form_line"></span>
            </div>
                <input name="Nombre" type="text" id="name" class="form_input" placeholder=" ">
                <label for="name" class="form_label">Nombre</label>
                <span class="form_line"></span>
            </div>
          
            <div class="form_group">
                <input name="foto" type="file" id="foto" accept=".jpg, .jpeg , .png" class="form_input" placeholder=" ">
                <label for="foto" class="form_label">subir foto</label>
                <span class="form_line"></span>
            </div>
            <br>
            <br>
            <input type="submit" class="form_submit" value="Enviar Informacion">
        </div>
</from>
    
</body>
</html>