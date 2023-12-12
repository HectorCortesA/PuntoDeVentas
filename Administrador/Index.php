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
?>
<!DOCTYPE html>
<html lang="en"> <!-- Corrección: "lang" en lugar de "lang" y apertura de etiqueta "html" -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="CSS/Index.css" />
</head>
<body>
    <div class="img">
        <img src="image/logo.png" alt="Logo"> <!-- Agregado el atributo "alt" para accesibilidad -->
    </div>
    <div class="row1">
        <div class="btn">
            <a class="btn2" href="NewProduc.php">Añadir Producto</a>
        </div>
        <div class="btn3">
            <a class="btn4" href="registro.php">Registro</a>
        </div>
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
                    <th>marca</th> <!-- Cambio "td" a "th" para encabezado de tabla -->
                    <th>tipo</th>
                    <th>lote</th>
                    <th>Cantidad</th>
                    <th>precio</th>
                    <th>provedor</th>
                    <th>Acciones</th> <!-- Agregada columna de acciones -->
                </tr>
            </thead>
            <tbody> <!-- Agregada etiqueta "tbody" para el cuerpo de la tabla -->
            <?php
            $sql = "SELECT * FROM inventarioo"; // Corrección: Eliminado espacio antes de "*"
            $result = mysqli_query($conexion, $sql);
            while ($mostrar = mysqli_fetch_array($result)) { // Corrección: Cambio "myqli" a "mysqli"
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
                        <a href="EditProd.php?
                        ID=<?php echo $mostrar[0]?>&
                        NewProduc=<?php echo $mostrar[1]?>&
                        DesProduc=<?php echo $mostrar[3]?>&
                        CodeBa=<?php echo $mostrar[2]?>&
                        marca=<?php echo $mostrar[4]?>&
                        tipo=<?php echo $mostrar[5]?>&
                        lote=<?php echo $mostrar[6]?>&
                        Cant=<?php echo $mostrar[7]?>&
                        precio=<?php echo $mostrar[8]?>&
                        prove=<?php echo $mostrar[9]?>
                        ">Editar</a>
                        <a href="Eliminar.php?ID=<?php echo $mostrar[0]?>">Eliminar</a>
                    </td>
                </tr>
            <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</body>
</html>
