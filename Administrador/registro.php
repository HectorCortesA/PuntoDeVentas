<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="CSS/registro.css" />
</head>
<body>
    <div class="img">
        <img src="image/logo.png">
    </div>
    <div class="form">
        <form action="registroo.php" method="POST">
            <div>
                <h1>Registro de Empleado</h1>
                <br>
            </div>
            <div class="row">
                <div class="user">
                    <label>Usuario</label>
                    <input type="text" id="user" name="user"/>
                </div>
                <div class="x1"></div>
                <div class="name">
                    <label>Nombre</label>
                    <input type="text" id="name" name="name"/>
                </div>
            </div>
            <div class="password">
                <label>Contraseña</label>
                <input type="password" id="password" name="password"/>
            </div>
            <div class="btn1">
                <input type="submit" value="Anadir nuevo Usuario" class="btn2"/>
            </div>
        </form>
    </div>
</body>
</html>