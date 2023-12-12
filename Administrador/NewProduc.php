<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Producto</title>
    <link rel="stylesheet" href="CSS/NewProduc.css"/>
</head>
<body>
    <div class="img">
        <img src="image/logo.png">
    </div>

    <div>
        <form action="NewProduct.php" method="POST" >
            <div>
                <h1>Añadir Nuevo Producto</h1>
            </div>
            <div class="colum">
                <div class="name">
                    <input type="text" id="NewProduc" name="NewProduc" placeholder="Nombre de Producto"/>
                </div>
                <div class="codebar">
                    <input type="number" id="CodeBa" name="CodeBa" placeholder="Codigo de barras"/>
                </div>
                <div class="DesProduc">
                    <input type="text" id="DesProduc" name="DesProduc" placeholder="Descripcion de productos"/> 
                </div>

            </div>
            <div class="row1">
                <div class="marca">
                    <input type="text" id="marca" name="marca" placeholder="Marca"/>
                </div>
                <div class="tipo">
                    <input type="text" id="tipo" name="tipo" placeholder="Tipo"/>
                </div>
                <div class="lote">
                    <input type="text" id="lote" name="lote" placeholder="Lote"/>
                </div>
                <div class="cant">
                    <input type="number" id="Cant" name="Cant" placeholder="Cantidad"/>
                </div>
                <div class="precio">
                    <input type="number" id="precio" name="precio" placeholder="Precio"/>
                </div>  
            </div>
            <div class="colum1">
                <input type="text" id="prove" name="prove" placeholder="Provedor" / >
            </div>
            <div class="btn1">
                <input type="submit" id="anaPro" name="anaPro" value="Añadir Producto" class="btn2"/>
            </div> 
            <div class="btn3">
                <a href="Index.php">Menu</a>
            </div>
        </form>
    </div>
    
</body>
</html>