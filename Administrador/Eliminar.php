<?php
$ID = $_GET['ID'];
$servername = "localhost"; // Cambia esto a tu servidor de base de datos
$username = "root"; // Cambia esto a tu nombre de usuario de la base de datos
$password = ""; // Cambia esto a tu contraseña de la base de datos
$database = "suplestore"; // Cambia esto a tu nombre de base de datos

// Conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $database);

$sql = "DELETE FROM inventarioo WHERE ID = '$ID'";
$rta = mysqli_query($conn, $sql);

    header("Location: Index.php");

?>