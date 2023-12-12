<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Imprimir Pedido</title>
</head>
<body>
    <h1>Detalle del Pedido</h1>
    
    <ul>
    <?php
    // Accede a los datos del carrito desde la sesión
    if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        $cart = $_SESSION['cart'];

        foreach ($cart as $product) {
            echo '<li>Producto: ' . $product['NewProduc'] . ', Precio: $' . $product['precio'] . '</li>';
        }
    } else {
        echo '<li>El carrito está vacío.</li>';
    }
    ?>
    </ul>
    
    <!-- Agrega cualquier información adicional o estilo para tu página de impresión aquí -->

    <button onclick="window.print()">Imprimir</button>
</body>
</html>
