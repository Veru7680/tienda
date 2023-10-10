<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Proveedores</title>
    <link rel="stylesheet" href="../../css/estiloTablas.css">
</head>
<body>
    
    <h1>Productos</h1>
    <?php
     include "../../../conexion.php";
    $select_query = "SELECT * FROM producto LIMIT 10";
    $result = mysqli_query($mysqli_link, $select_query);
    ?>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>IdCategoria</th>
            <th>Descripcion</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $row['ID'] . "</td>";
            echo "<td>" . $row['Nombre'] . "</td>";
            echo "<td>" . $row['Precio'] ." Bs"."</td>";
            echo "<td>" . $row['Stock'] . "</td>";
            echo "<td>" . $row['IdCategoria'] . "</td>";
            echo "<td>" . $row['Descripcion'] . "</td>";
            echo "</tr>";
        }
        // close the db connection
        mysqli_close($mysqli_link);
        ?>
    </table>
</body>
</html>
