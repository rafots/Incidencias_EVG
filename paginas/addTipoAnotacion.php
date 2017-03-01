<?php
session_start();
require '../procedimientos/procedimientos.php';
if(!isset($_SESSION['coordinador']) || $_SESSION['coordinador']!=1) {
    echo 'Acceso prohibido';

}
?>
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
                <button class=" btn btn-primary btn-success">P</button>
                <button class=" btn btn-primary btn-success" disabled="disabled">C</button>
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

            <form method="post" action="../consultas/conAltaTipoAnotacion.php">
                <label>Nombre del tipo de anotacion</label>
                <input type="text" name="nombreTipo"/>
                <!--<label>Etapa</label>-->
                <?php
                if(isset($_GET["consulta"]) && $_GET["consulta"]=='ok')
                {
                    echo '<p>Se ha introducido con exito el tipo de incidencia.</p>';
                }
                ?>
                <input type="submit" name="enviar" value="Añadir tipo">
            </form>
            <a href="gestionTipos.php">Volver</a>
        </article>
    </div>
    <!-- /CUERPO DE LA PÁGINA -->
</div>

</body>
</html>