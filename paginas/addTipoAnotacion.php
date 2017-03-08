<?php

    require '../procedimientos/procedimientos.php';
    $conexion = new conexion();
    $conectar = new mysqli($conexion->getServer(),$conexion->getUser(),$conexion->getPass(),$conexion->getDb());

        echo '<h3>Tipos de anotaciones</h3>
            <div>
                <h4>Tipos de anotaciones disponibles</h4>
                ';
                    require "../consultas/listadoTipoAnotaciones.php";


        echo '
            </div>
            <div>
                <h4>Añadir tipo de anotacion</h4>
                <form method="post" action="../consultas/conAltaTipoAnotacion.php">
                    <label>Nombre del tipo de anotacion</label>
                    <input type="text" name="nombreTipo"/>
                    <!--<label>Etapa</label>-->
                    
                    <input type="submit" name="enviar" value="Añadir tipo">
                </form>
                <a href="gestionTipos.php">Volver</a>
            </div>
        ';

?>


