<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <link rel="stylesheet" href="../../../cssingreso/product.css">

</head>
<body>
    <h1>Ventas realizadas</h1>
    <table>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Fecha</th>
            <th>Monto Final</th>
            <th>Descuento</th>
        </tr>
        <?php
        // Establece la conexión a la base de datos (ajusta los valores según tu configuración)
        include "../../../conexion.php";

        if (!$mysqli_link) {
            die("Error en la conexión a la base de datos: " . mysqli_connect_error());
        }

        $query = mysqli_query($mysqli_link, "SELECT * FROM venta");
        $result = mysqli_num_rows($query);
        if ($result > 0) {
            while ($data = mysqli_fetch_array($query)) {
        ?>

        <tr>
            <td><?php echo $data['ID_Pedido'] ?></td>
            <td><?php echo $data['Nombre']  ?></td>
            <td><?php echo $data['Fecha'] ?></td>
            <td><?php echo $data['Monto_final'] ?></td>
            <td><?php echo $data['Descuento'] ?></td>
        <?php
            }
        }
        ?>
    </table>
</body>
</html>
