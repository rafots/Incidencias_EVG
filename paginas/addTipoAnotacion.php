<?php
    require '../procedimientos/procedimientos.php';
    $conexion = new conexion();
    $conectar = new mysqli($conexion->getServer(),$conexion->getUser(),$conexion->getPass(),$conexion->getDb());
    if(!isset($_SESSION['coordinador']) || $_SESSION['coordinador']!=1) {
        echo 'Acceso prohibido';

    }
    else
    {
        echo '<h3>Tipos de anotaciones</h3>
            <div>
                <h4>Tipos de anotaciones disponibles</h4>
                <?php
                    require "../consultas/listadoTipoAnotaciones.php";

                ?>

            </div>
            <div>
                <h4>Añadir tipo de anotacion</h4>
                <form method="post" action="../consultas/conAltaTipoAnotacion.php">
                    <label>Nombre del tipo de anotacion</label>
                    <input type="text" name="nombreTipo"/>
                    <!--<label>Etapa</label>-->
                    <?php
                    if(isset($_GET["consulta"]) && $_GET["consulta"]==\'ok\')
                    {
                        echo \'<p>Se ha introducido con exito el tipo de anotacion.</p>\';
                    }
                    ?>
                    <input type="submit" name="enviar" value="Añadir tipo">
                </form>
                <a href="gestionTipos.php">Volver</a>
            </div>
        ';
    }

?>


