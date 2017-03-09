<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inicio Sesión</title>
    <link type="text/css" href="../sources/bootstrap.css" rel="stylesheet">
    <link type="text/css" href="../sources/comun.css" rel="stylesheet">
    <script type="text/javascript" src="../sources/bootstrap.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
</head>
<body>
<div id="contenedor" class="row container text-center " >
    <div class="col-md-6"><img src="../imagenes/logotipo.png"> </div>
    <div class="col-md-6"><h1><p>GESTOR</p></h1></div>
    <div class="col-md-12">
        <form class="form-horizontal" action="../consultas/iniciarSesionGestor.php" method="post">
            <div class="col-md-12 form-group">
                <label for="Usuario" class="control-label col-md-5">Usuario</label>

                <div class="col-md-1"> <input type="text" name="user"></div>
            </div>
            <div class="col-md-12 form-group">
                <label for="Contraseña" class="control-label col-md-5">Contraseña</label>

                <div class="col-md-1"> <input type="password" name="pass"></div>
            </div>
            <div class="col-md-12 espacios">
                <button  type="submit" class="btn btn-success">Entrar</button>
            </div>
            <div class="col-md-12 espacios">
                <p>¿Has olvidado la contraseña?</p>
            </div>
        </form>
    </div>
</div>
</body>
</html>
