<?php
$ID = $_POST['ID'];
$NewProduc = $_POST['NewProduc'];
$CodeBa = $_POST['CodeBa'];
$DesProduc = $_POST['DesProduc'];
$marca = $_POST['marca'];
$tipo = $_POST['tipo'];
$lote = $_POST['lote'];
$Cant = $_POST['Cant'];
$precio = $_POST['precio'];
$prove = $_POST['prove'];

$cnx = mysqli_connect("localhost", "root", "", "suplestore");
// Actualiza los datos en la tabla "inventarioo"
$sql = "UPDATE inventarioo SET NewProduc='$NewProduc', CodeBa='$CodeBa', DesProduc='$DesProduc', marca='$marca', tipo='$tipo', lote='$lote', Cant='$Cant', precio='$precio', prove='$prove' WHERE ID = '$ID'";
$sta = mysqli_query($cnx, $sql);
header("Location: Index.php");
?>
