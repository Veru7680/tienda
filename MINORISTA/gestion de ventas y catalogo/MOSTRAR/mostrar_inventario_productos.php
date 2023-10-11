<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <link rel="stylesheet" href="product.css">

</head>
<body>
    <h1>DATOS GUARDADOS</h1>
    <table>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>IdCat</th>
            <th>Descripcion</th>
            <th>Foto</th>
        </tr>
        <?php
        // Establece la conexión a la base de datos (ajusta los valores según tu configuración)
        $conexion = mysqli_connect("localhost", "root", "", "tienda");

        if (!$conexion) {
            die("Error en la conexión a la base de datos: " . mysqli_connect_error());
        }

        $query = mysqli_query($conexion, "SELECT * FROM producto");
        $result = mysqli_num_rows($query);
        if ($result > 0) {
            while ($data = mysqli_fetch_array($query)) {
        ?>

        <tr>
            <td><?php echo $data['ID'] ?></td>
            <td><?php echo $data['Nombre']  ?></td>
            <td><?php echo $data['Precio'] ?></td>
            <td><?php echo $data['Stock'] ?></td>
            <td><?php echo $data['IdCategoria'] ?></td>
            <td><?php echo $data['Descripcion'] ?></td>
            <td><img height="100px" src="data:image/jpg;base64, <?php echo base64_encode($data['foto']) ?>"></td>
        </tr>
        <?php
            }
        }
        ?>
    </table>
</body>
</html>
