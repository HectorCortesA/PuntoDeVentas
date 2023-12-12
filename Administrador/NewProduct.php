<?php
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

// Verifica si se ha enviado el formulario
if (isset($_POST["anaPro"])) {
    // Recoge y limpia los datos del formulario (para prevenir inyecciones SQL)
    $NewProduc = $conexion->real_escape_string($_POST["NewProduc"]);
    $CodeBa = $conexion->real_escape_string($_POST["CodeBa"]);
    $DesProduc = $conexion->real_escape_string($_POST["DesProduc"]);
    $marca = $conexion->real_escape_string($_POST["marca"]);
    $tipo = $conexion->real_escape_string($_POST["tipo"]);
    $lote = $conexion->real_escape_string($_POST["lote"]);
    $Cant = intval($_POST["Cant"]); // Asegúrate de que es un número entero
    $precio = floatval($_POST["precio"]); // Asegúrate de que es un número de punto flotante
    $prove = $conexion->real_escape_string($_POST["prove"]);

    // Prepara la consulta SQL para insertar el nuevo producto en la tabla de inventario
    $sql = "INSERT INTO inventarioo (NewProduc, CodeBa, DesProduc, marca, tipo, lote, Cant, precio, prove) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("ssssssdds", $NewProduc, $CodeBa, $DesProduc, $marca, $tipo, $lote, $Cant, $precio, $prove);

    if ($stmt->execute()) {
        // El producto se ha agregado con éxito, redirige a la página de inventario principal
        header("Location: Index.php");
        exit();
    } else {
        echo "Error al agregar el producto: " . $stmt->error;
    }

    $stmt->close();
}

// Cierra la conexión a la base de datos
$conexion->close();
?>
