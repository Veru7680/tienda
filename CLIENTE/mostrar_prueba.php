<?php
$conexion = mysqli_connect("localhost", "root", "", "tienda");

if (!$conexion) {
    die("Error en la conexión a la base de datos: " . mysqli_connect_error());
}

$query = mysqli_query($conexion, "SELECT * FROM producto");
$result = mysqli_num_rows($query);
$productos = [];

if ($result > 0) {
    while ($data = mysqli_fetch_array($query)) {
        $productos[] = $data;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <link rel="stylesheet" href="../../../cssingreso/product.css">
    <link rel="stylesheet" href="catalogo.css">
</head>
<body>
    <h1>PRODUCTOS DISPONIBLE</h1>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Descripcion</th>
            <th>Foto</th>
        </tr>
        <?php foreach ($productos as $data) : ?>
            <tr>
                <td><?php echo $data['Nombre']  ?></td>
                <td><?php echo $data['Precio'] ?></td>
                <td><?php echo $data['Stock'] ?></td>
                <td><?php echo $data['Descripcion'] ?></td>
                <td><img height="200px" src="data:image/jpg;base64, <?php echo base64_encode($data['foto']) ?>"></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
