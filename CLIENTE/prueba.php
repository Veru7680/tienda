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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
	<link rel="stylesheet" href="prueba.css">
</head>
<body>
    <div class="contenido">
        <?php foreach ($productos as $data) : ?>
            <div class="card">
                <figure>
                    <img height="200px" src="data:image/jpg;base64, <?php echo base64_encode($data['foto']) ?>">
                </figure>
                <div class="contenido">
                    <p><strong>Nombre:</strong> <?php echo $data['Nombre'] ?></p>
                    <p><strong>Precio:</strong> <?php echo $data['Precio'] ?></p>
                    <p><strong>Stock:</strong> <?php echo $data['Stock'] ?></p>
                    <p><strong>Descripción:</strong></p>
                    <p><?php echo $data['Descripcion'] ?></p>
					<a href="CLIENTE/detalle_Venta/REG_VENTA.php" class="btn-neon">
        <span id="span1"></span>
        <span id="span2"></span>
        <span id="span3"></span>
        <span id="span4"></span>
        Comprar
    </a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
