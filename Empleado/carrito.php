<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="CSS/Index.css" />
</head>
<body>
    <div class="img">
        <img src="image/logo.png" alt="Logo">
    </div>
    <div class="x"></div>
    <div class="tabla">
        
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Producto</th>
                    <th>Descripción</th>
                    <th>Codigo</th>
                    <th>marca</th>
                    <th>tipo</th>
                    <th>lote</th>
                    <th>Cantidad</th>
                    <th>precio</th>
                    <th>provedor</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php
            // Realiza la conexión a la base de datos (ajusta estos valores)
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "suplestore";

            // Conexión a la base de datos
            $conexion = new mysqli($servername, $username, $password, $database);

            if ($conexion->connect_error) {
                die("Error de conexión: " . $conexion->connect_error);
            }

            if (isset($_GET['search'])) {
                $search = $_GET['search'];
                $sql = "SELECT * FROM inventarioo WHERE NewProduc LIKE '%$search%'";
            } else {
                $sql = "SELECT * FROM inventarioo";
            }

            $result = mysqli_query($conexion, $sql);
            while ($mostrar = mysqli_fetch_array($result)) {
            ?>
                <tr>
                    <td><?php echo $mostrar['ID']; ?></td>
                    <td><?php echo $mostrar['NewProduc']; ?></td>
                    <td><?php echo $mostrar['DesProduc']; ?></td>
                    <td><?php echo $mostrar['CodeBa']; ?></td>
                    <td><?php echo $mostrar['marca']; ?></td>
                    <td><?php echo $mostrar['tipo']; ?></td>
                    <td><?php echo $mostrar['lote']; ?></td>
                    <td><?php echo $mostrar['Cant']; ?></td>
                    <td><?php echo $mostrar['precio']; ?></td>
                    <td><?php echo $mostrar['prove']; ?></td>
                    <td>
                        <button onclick="addToCart(<?php echo $mostrar['ID']; ?>)">Añadir al carrito</button>
                    </td>
                </tr>
            <?php
            }
            ?>
            </tbody>
        </table>
    </div>
    <div>
        <h2>Carrito de compras</h2>
        <ul id="cart">
        </ul>
        <p>Total: $<span id="totalPrice">0.00</span></p>
        <button onclick="clearCart()">Limpiar Carrito</button>
        <button onclick="processPayment()">Pagar Ahora</button>
        <button onclick="printTicket()">Imprimir Ticket</button>
        <div id="paymentMessage"></div>
    </div>
    <div id="datetime">
        <!-- Aquí se mostrará la fecha y hora -->
    </div>
    <script>
        function processPayment() {
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'process_payment.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Lógica para manejar la respuesta del servidor después de procesar el pago
            const paymentMessage = document.getElementById('paymentMessage');
            paymentMessage.textContent = '¡Pago exitoso! Su compra ha sido procesada.';

            // Limpiar el carrito en la interfaz
            cart = [];
            updateCart();
        }
    };
    xhr.send();
}

        let cart = [];

        function addToCart(productID) {
            const xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    const productDetails = JSON.parse(xhr.responseText);
                    if (productDetails) {
                        cart.push(productDetails);
                        updateCart();
                        
                        // Guardar los detalles del producto en la sesión
                        // Asegúrate de que la sesión se haya iniciado en la parte superior del archivo.
                        <?php if(isset($_SESSION)): ?>
                            <?php if(!empty($productDetails)): ?>
                                <?php if(!isset($_SESSION['cart'])): ?>
                                    <?php $_SESSION['cart'] = array(); ?>
                                <?php endif; ?>
                                <?php $_SESSION['cart'][] = $productDetails; ?>
                            <?php endif; ?>
                        <?php endif; ?>
                    }
                }
            };
            xhr.open('GET', 'get_product_details.php?id=' + productID, true);
            xhr.send();
        }

        function updateCart() {
            const cartList = document.getElementById('cart');
            cartList.innerHTML = '';
            let totalPrice = 0;

            cart.forEach(product => {
                const listItem = document.createElement('li');
                listItem.textContent = `Producto: ${product.NewProduc}, Precio: $${product.precio}`;
                cartList.appendChild(listItem);
                totalPrice += parseFloat(product.precio);
            });

            document.getElementById('totalPrice').textContent = totalPrice.toFixed(2);
        }

        function clearCart() {
            cart = [];
            updateCart();
        }

       

        




        function printTicket() {
            const printWindow = window.open('', '', 'width=600,height=600');
            printWindow.document.open();
            printWindow.document.write('<html><head><title>SupleStore</title></head><body>');
            printWindow.document.write('<h1>Detalle del Pedido</h1>');
            printWindow.document.write('<div id="datetime">Fecha y Hora: ' + new Date() + '</div>'); // Muestra la fecha y hora
            printWindow.document.write('<ul>');
            
            cart.forEach(product => {
                printWindow.document.write('<li>Producto: ' + product.NewProduc + ', Precio: $' + product.precio + '</li>');
            });

            printWindow.document.write('</ul>');
            printWindow.document.write('<p>Total: $<span id="totalPrice">' + document.getElementById('totalPrice').textContent + '</span></p>'); // Muestra el precio total
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print();
        }
    </script>
</body>
</html>
