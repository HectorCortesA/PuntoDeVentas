
<?php
// Configuración de la base de datos
$servername = "localhost"; // Cambia esto a tu servidor de base de datos
$username = "root"; // Cambia esto a tu nombre de usuario de la base de datos
$password = ""; // Cambia esto a tu contraseña de la base de datos
$database = "suplestore"; // Cambia esto a tu nombre de base de datos

// Conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión a la base de datos fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST["user"];
    $password = $_POST["password"];

    // Consulta SQL para buscar el usuario en la base de datos
    $sql = "SELECT * FROM registroo WHERE user = '$user' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Inicio de sesión exitoso
        include("index.php");
    } else {
        // Credenciales incorrectas
        echo "<script>alert('Error: No se encontraron datos en la base de datos.');</script>";
    }
}
