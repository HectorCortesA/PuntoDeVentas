<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SupleStore</title>
    <link rel="stylesheet" href="CSS/EditProd.css">
</head>
<body>
    <div class="img">
        <img src="image/logo.png">
    </div>
    <h2>Editar Producto</h2>
    <?php
        $ID = $_GET['ID'];
        $NewProduc = $_GET['NewProduc'];
        $CodeBa = $_GET['CodeBa'];
        $DesProduc = $_GET['DesProduc'];
        $marca = $_GET['marca'];
        $tipo = $_GET['tipo'];
        $lote = $_GET['lote'];
        $Cant = $_GET['Cant'];
        $precio = $_GET['precio'];
        $prove = $_GET['prove'];
    ?>
    <div>
        <form action="Editar.php" method="POST">
            <div class="text1">
                <div class="NewProduc">
                    <input type="text" name="NewProduc" placeholder="Nombre de Producto" value="<?=$NewProduc?>"/>
                </div>
                <div class="CodeBa">
                    <input type="number" name="CodeBa" placeholder="Codigo de barras" value="<?=$CodeBa?>"/>
                </div>
                <div class="DesProduc">
                    <input type="text" name="DesProduc" placeholder="Descripcion de productos" value="<?=$DesProduc?>"/>
                </div>
            </div>
            <div class="text2">
                <input type="text" name="marca" placeholder="Marca" value="<?=$marca?>"/>
                <input type="text" name="tipo" placeholder="Tipo" value="<?=$tipo?>"/>
                <input type="text" name="lote" placeholder="Lote" value="<?=$lote?>"/>
                <input type="number" name="Cant" placeholder="Cantidad" value="<?=$Cant?>"/>
                <input type="number" name="precio" placeholder="Precio" value="<?=$precio?>"/>
                <!-- Agrega un campo oculto para ID -->
                <input type="hidden" name="ID" value="<?=$ID?>">
            </div>
            <br>
            <div class="text3">
                <input type="text" name="prove" placeholder="Proveedor" value="<?=$prove?>"/>
            </div>
            <div class="btn">
                <input type="submit" value="Finalizar" class="btn2">
            </div>
        </form>
    </div>
</body>
</html>
