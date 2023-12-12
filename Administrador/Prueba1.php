

    <?php
    // Verifica si se ha enviado el formulario de edición
    if (isset($_POST["editarProducto"])) {
        // Realiza la conexión a la base de datos (ajusta estos valores)
        $servername = "localhost"; // Cambia esto a tu servidor de base de datos
        $username = "root"; // Cambia esto a tu nombre de usuario de la base de datos
        $password = ""; // Cambia esto a tu contraseña de la base de datos
        $database = "suplestore"; // Cambia esto a tu nombre de base de datos

        // Conexión a la base de datos
        $conexion = new mysqli($servername, $username, $password, $database);

        // Verifica la conexión
        if ($conexion->connect_error) {
            die("Error de conexión: " . $conexion->connect_error);
        }

        // Recoge y limpia los datos del formulario
        $id = intval($_POST["id"]); // Asegúrate de que el ID sea un número entero
        $NewProduc = $conexion->real_escape_string($_POST["NewProduc"]);
        $CodeBa = $conexion->real_escape_string($_POST["CodeBa"]);
        $DesProduc = $conexion->real_escape_string($_POST["DesProduc"]);
        $marca = $conexion->real_escape_string($_POST["marca"]);
        $tipo = $conexion->real_escape_string($_POST["tipo"]);
        $lote = $conexion->real_escape_string($_POST["lote"]);
        $Cant = intval($_POST["Cant"]); // Asegúrate de que es un número entero
        $precio = floatval($_POST["precio"]); // Asegúrate de que es un número de punto flotante
        $prove = $conexion->real_escape_string($_POST["prove"]);

        // Prepara la consulta SQL para actualizar el producto en la tabla de inventario
        $sql = "UPDATE inventarioo SET NewProduc = ?, CodeBa = ?, DesProduc = ?, marca = ?, tipo = ?, lote = ?, Cant = ?, precio = ?, prove = ? WHERE id = ?";

        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("ssssssddsi", $NewProduc, $CodeBa, $DesProduc, $marca, $tipo, $lote, $Cant, $precio, $prove, $id);

        if ($stmt->execute()) {
            echo "El producto se ha actualizado con éxito.";
        } else {
            echo "Error al editar el producto: " . $stmt->error;
        }

        $stmt->close();
        $conexion->close();
    }
    ?>

    <?php
    // Obtener el ID del producto seleccionado desde la página anterior
    if (isset($_GET["id"])) {
        $selectedProductId = $_GET["id"];
        
        // Realiza la conexión a la base de datos (ajusta estos valores)
        $servername = "localhost"; // Cambia esto a tu servidor de base de datos
        $username = "root"; // Cambia esto a tu nombre de usuario de la base de datos
        $password = ""; // Cambia esto a tu contraseña de la base de datos
        $database = "suplestore"; // Cambia esto a tu nombre de base de datos

        // Conexión a la base de datos
        $conexion = new mysqli($servername, $username, $password, $database);

        // Verifica la conexión
        if ($conexion->connect_error) {
            die("Error de conexión: " . $conexion->connect_error);
        }

        // Consulta SQL para obtener los datos del producto seleccionado
        $sql = "SELECT * FROM inventarioo WHERE id = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("i", $selectedProductId);
        $stmt->execute();

        $result = $stmt->get_result();
        
        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            // Mostrar el formulario de edición prellenado con los datos del producto
    ?>
            <form action="editar_producto.php" method="post">
                <input type="hidden" name="id" value="<?php echo $selectedProductId; ?>">

                <label for="NewProduc">Nombre del Producto:</label>
                <input type="text" name="NewProduc" value="<?php echo $row["NewProduc"]; ?>"><br>

                <label for="CodeBa">Código de Barras:</label>
                <input type="text" name="CodeBa" value="<?php echo $row["CodeBa"]; ?>"><br>

                <label for="DesProduc">Descripción del Producto:</label>
                <input type="text" name="DesProduc" value="<?php echo $row["DesProduc"]; ?>"><br>

                <label for="marca">Marca:</label>
                <input type="text" name="marca" value="<?php echo $row["marca"]; ?>"><br>

                <label for="tipo">Tipo:</label>
                <input type="text" name="tipo" value="<?php echo $row["tipo"]; ?>"><br>

                <label for="lote">Lote:</label>
                <input type="text" name="lote" value="<?php echo $row["lote"]; ?>"><br>

                <label for="Cant">Cantidad:</label>
                <input type="number" name="Cant" value="<?php echo $row["Cant"]; ?>"><br>

                <label for="precio">Precio:</label>
                <input type="number" step="0.01" name="precio" value="<?php echo $row["precio"]; ?>"><br>

                <label for="prove">Proveedor:</label>
                <input type="text" name="prove" value="<?php echo $row["prove"]; ?>"><br>

                <input type="submit" name="editarProducto" value="Editar Producto">
            </form>
    <?php
        }
        $stmt->close();
        $conexion->close();
    }
    ?>
</body>
</html>
