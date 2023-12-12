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

$search = isset($_GET['search']) ? $_GET['search'] : '';

if (!empty($search)) {
    // Consulta SQL para buscar productos que coincidan con el término de búsqueda
    $sql = "SELECT * FROM inventarioo WHERE NewProduc LIKE '%$search'";

    $result = mysqli_query($conexion, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<table>";
        echo "<thead><tr><th>ID</th><th>Producto</th><th>Descripción</th><th>Codigo</th><th>marca</th><th>tipo</th><th>lote</th><th>Cantidad</th><th>precio</th><th>prove</th><th>Acciones</th></tr></thead>";
        echo "<tbody>";

        while ($mostrar = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $mostrar['ID'] . "</td>";
            echo "<td>" . $mostrar['NewProduc'] . "</td>";
            echo "<td>" . $mostrar['DesProduc'] . "</td>";
            echo "<td>" . $mostrar['CodeBa'] . "</td>";
            echo "<td>" . $mostrar['marca'] . "</td>";
            echo "<td>" . $mostrar['tipo'] . "</td>";
            echo "<td>" . $mostrar['lote'] . "</td>";
            echo "<td>" . $mostrar['Cant'] . "</td>";
            echo "<td>" . $mostrar['precio'] . "</td>";
            echo "<td>" . $mostrar['prove'] . "</td>";
            echo "<td>";
            echo '<button onclick="addToCart(' . $mostrar['ID'] . ')">Añadir al carrito</button>';
            echo "</td>";
            echo "</tr>";
        }

        echo "</tbody>";
        echo "</table>";
    } else {
        echo "No se encontraron resultados.";
    }
}

if (isset($_GET['id'])) {
    $productId = $_GET['id'];

    $sql = "SELECT NewProduc, precio FROM inventarioo WHERE ID = $productId";

    $result = mysqli_query($conexion, $sql);
    $productDetails = mysqli_fetch_assoc($result);

    echo json_encode($productDetails);
}

$conexion->close();
?>
