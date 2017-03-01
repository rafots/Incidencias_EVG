<?php
session_start();
if(isset($_SESSION['coordinador']))
{


    echo'
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link type="text/css" href="../sources/bootstrap.css" rel="stylesheet">
    <link type="text/css" href="../sources/comun.css" rel="stylesheet">
    <script type="text/javascript" src="../sources/bootstrap.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body>

<div class="container caja">
        <!-- CABECERA -->
        <header>
            <div class="row vertical-align text-center">
                <div class="col-md-6 col-sm-6">
                    <img class="img-responsive img-center" src="../imagenes/logotipo.png"/>
                </div>
                <div class="col-md-3 col-sm-3">
                    <div id="title-cdi">CONTROL DE INCIDENCIAS</div>
                </div>
                <div class="col-md-3 col-sm-3">
                ';
                    if(isset($_SESSION['tutor']))
                    {
                        echo '<a class=" btn btn-primary btn-success" href="tutor.php">T</a>';
                    }
                    if(isset($_SESSION['profesor']))
                    {
                        echo '<a class=" btn btn-primary btn-success" href="profesor.php">P</a>';
                    }
                    if(isset($_SESSION['coordinador']))
                    {
                        echo '<a class=" btn btn-primary btn-success disabled">C</a>';
                    }
                    echo '
                </div>
            </div>
        </header>
        <!-- /CABECERA -->

        <!-- CUERPO DE LA PÁGINA -->
        <div class="row">
            <aside class="col-md-3">
                <!--
                *
                * Estos botones son simplemente de ejemplo
                *
                -->
                <a href="#" class="btn btn-success menu-buttons" role="button">Incidencias destacables</a>
                <a href="#" class="btn btn-success menu-buttons" role="button">Historial alumnos</a>
                <a href="#" class="btn btn-success menu-buttons" role="button">Aula de convivencia</a>
                <a href="gestionTipos.php" class="btn btn-success menu-buttons" role="button">Tipos Incidencias</a>
                <a href="#" class="btn btn-success menu-buttons" role="button">Cerrar sesión</a>
            </aside>
            <article class="col-md-9 articulo">
                Hola<br>
                Hola<br>
                Hola<br>
                Hola<br>
                Hola<br>
                Hola<br>
                Hola<br>
            </article>
        </div>
        <!-- /CUERPO DE LA PÁGINA -->
    </div>

</body>
</html>
';
}
else
{
    echo 'Acceso prohibido';
}
