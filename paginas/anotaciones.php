<?php
    require_once "validaranotaciones.php";

    function coordinador(){

        require "../consultas/consultaanotaciontutor.php";

        visualizar($objeto);
    }

    function tutor(){
        require_once "../consultas/consultaanotacioncoordinador.php";
        visualizar($objeto);
    }

    function profesor(){
        require_once "../consultas/consultaanotacionprofesor.php";
        visualizar($objeto);
    }

    function visualizar($objeto){

        echo' <h4>Anotaciones</h4>';
        while($fila=$objeto->devolverfilas()) {
            echo '<h7>Tipo de anotacion:' . $fila["numAnotacion"] . '</h7>';
            echo '<br/>';
            echo '<h7>Descripcion de la anotacion:' . $fila["tipoAnotaciones"] . '</h7>';
            echo '<br/>';
            echo '<h7>NIA del alumno implicado:' . $fila["anotacion"] . '</h7>';
            echo '<br/>';
            echo '<h7>Nombre del Alumno:' . $fila["nombreCompleto"] . '</h7>';
            echo '<br/>';
            echo '<a id="anotacionesmostrar">Ver la anotacion en detalle</a>';
            echo '<br/><br/>';
        }
    }
    


?>