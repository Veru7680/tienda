<?php
    include "../../conexion.php";
    $query=mysqli_query($mysqli_link,"SELECT Nombre FROM usuarios");
    $query1=mysqli_query($mysqli_link,"SELECT Nombre, Precio FROM producto");

     
    session_start(); 
    if (!isset($_SESSION['Nombre'])) {
        $_SESSION['msg'] = "You must log in first";
        header('location: ../Login_clientes/continuar_cliente.php');
    }
    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['Nombre']);
        header("location: ../Login_clientes/continuar_cliente.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <link rel="stylesheet" href="estiloProv.css">
</head>
<style>
    .form_group:not(.initial) {
        display: none;
    }
    .form {
        max-width: 900px;
    }
</style>

<body>
   
    <form action="REG_VENTA_conect.php" method="post" class="form">
        <h2 class="form_tittle">COMPRAR</h2>
            <div class="form_container">
            <div class="form_group initial">
                <?php  if (isset($_SESSION['Nombre'])) : ?>Nombre: 
                    <strong style= "color: Black; font-size: 23px;"><?php echo $_SESSION['Nombre']; ?></strong>
                    <input type="hidden" name="Nombre_Cliente" value="<?php echo $_SESSION['Nombre']; ?>">
                    <?php endif ?>
                </div>
                <br>
            
            <div class="form_group initial">
                <input name="Fecha" type="date" id="Fecha" class="form_input" placeholder=" ">
                <label for="name" class="form_label">Fecha</label>
                <span class="form_line"></span>
            </div>
            <br>
            <div class="form_group initial">
                <p id="sumaSubtotales">MONTO FINAL: <span id="montoFinal">0.00</span></p>
                <input type="hidden" name="Monto_Final" id="montoFinalHidden" value="0.00">
                <input name="Descuento" type="text" id="descuento" placeholder="Descuento (%)">
                <button type="button" onclick="aplicarDescuento()">Aplicar Descuento</button>
            </div>
            <br>
            <button type="button" onclick="mostrarOcultarFormulario()">Detalle de Venta</button>

            <div class="form_group" id="formularioCompra">
                <table id="comprasTable">
                    <tr>
                        <th>Producto</th>
                        <th>Precio Unitario</th>
                        <th>Cantidad</th>
                        <th>Subtotal</th>
                        <th>Acción</th> 
                    </tr>
                    <!-- ... -->
                    <tr>
                        <td>
                            <select name="Nombre" class="form_input" onchange="actualizarPrecio(this)">
                                <option value="">Seleccione un producto</option> 
                                <?php
                                mysqli_data_seek($query1, 0); 
                                while ($datos1 = mysqli_fetch_array($query1)) {
                                ?>
                                    <option value="<?php echo $datos1['Precio'] ?>"> <?php echo $datos1['Nombre'] ?> </option>
                                <?php
                                }
                                ?>
                            </select>
                        </td>
                        <td><input type="text" name="precio[]" class="precio-input" readonly value=""></td>
                        <td><input type="number" name="cantidad[]" oninput="calcularSubtotal(this)"></td>
                        <td><input type="text" name="subtotal[]" class="subtotal-input" readonly value=""></td>
                        <td><button type="button" onclick="eliminarFila(this)">Eliminar</button></td> 
                    </tr>
                </table>
               
                <button type="button" onclick="agregarFila()">Agregar Otra Compra</button>
            </div>

            <br>
            <br>
            <input type="submit" class="form_submit" value="Enviar">
        </div>
    </form>

</body>
<script>
    let filaBase = document.getElementById("comprasTable").getElementsByTagName('tr')[1].cloneNode(true);

    function agregarFila() {
        let tabla = document.getElementById("comprasTable");
        let nuevaFila = filaBase.cloneNode(true);
        tabla.appendChild(nuevaFila);
    }

    function eliminarFila(button) {
        let fila = button.parentNode.parentNode; 
        fila.parentNode.removeChild(fila); 
    }

    function mostrarOcultarFormulario() {
        var formulario = document.getElementById("formularioCompra");
        formulario.style.display = (formulario.style.display === "none" || formulario.style.display === "") ? "block" : "none";
    }

    
    function actualizarPrecio(select) {
    var precioInput = select.parentNode.nextElementSibling.querySelector('.precio-input');
    var selectedOption = select.options[select.selectedIndex];
    var precio = selectedOption.value;
    
    
    if (precio !== "") {
        precioInput.value = precio;
    } else {
        precioInput.value = ""; 
    }
    }   

    

    
    function calcularSubtotal(inputCantidad) {
    var fila = inputCantidad.parentNode.parentNode;
    var inputPrecio = fila.querySelector('.precio-input');
    var inputSubtotal = fila.querySelector('.subtotal-input');
    
    var cantidad = parseFloat(inputCantidad.value) || 0; 
    var precio = parseFloat(inputPrecio.value) || 0; 
    
    var subtotal = cantidad * precio;
    inputSubtotal.value = subtotal.toFixed(2); 

    // Calcular la suma total de los subtotales
    var filas = document.querySelectorAll("#comprasTable tr:not(:first-child)"); 
    var sumaTotal = 0;
    filas.forEach(function (fila) {
        var subtotalInput = fila.querySelector('.subtotal-input');
        var subtotal = parseFloat(subtotalInput.value) || 0;
        sumaTotal += subtotal;
    });

   
    var sumaTotalDiv = document.getElementById("sumaSubtotales");
    sumaTotalDiv.textContent = "Total de Subtotales: " + sumaTotal.toFixed(2); 
    }

    function aplicarDescuento() {
    var descuento = parseFloat(document.getElementById("descuento").value) || 0;
    var filas = document.querySelectorAll("#comprasTable tr:not(:first-child)");
    var sumaTotal = 0;
    filas.forEach(function (fila) {
        var subtotalInput = fila.querySelector('.subtotal-input');
        var subtotal = parseFloat(subtotalInput.value) || 0;
        sumaTotal += subtotal;
    });

    // Calcular el monto final con el descuento
    var montoFinalConDescuento = sumaTotal * ((100 - descuento) / 100);

    // Actualizar el contenido del elemento 'sumaSubtotales' con el monto final con descuento
    document.getElementById("sumaSubtotales").innerHTML = "MONTO FINAL: " + montoFinalConDescuento.toFixed(2);

    // Actualizar el contenido del elemento 'montoFinalHidden'
    document.getElementById("montoFinalHidden").value = montoFinalConDescuento.toFixed(2);
}

    actualizarPrecio(document.getElementById("productoSelect"));
</script>
</html>