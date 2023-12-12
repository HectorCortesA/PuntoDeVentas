<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$database = "suplestore";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Registro de datos
if (isset($_POST['user']) && isset($_POST['password']) && isset($_POST['name'])) {
    $user = $_POST['user'];
    $password = $_POST['password'];
    $name = $_POST['name'];

    $sql = "INSERT INTO registroo (user, password, name) VALUES ('$user', '$password', '$name')";

    if ($conn->query($sql) === TRUE) {
        include("Index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


$conn->close();
?>


