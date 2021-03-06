<?php
require_once "validaranotaciones.php";

function coordinador(){
    require_once "consultadetalleanotacion.php";
    visualizar($objeto);
}

function tutor(){
    require_once "consultadetalleanotacion.php";
    visualizar($objeto);
}

function visualizar($objeto){
    if($objeto->numFilas()>0){
        while($fila=$objeto->devolverFilas()){
            echo '<h4>Tipo de anotacion:'.$fila["numAnotacion"].'</h4>';
            echo '<br/>';
            echo '<h4>Descripcion de la anotacion:'.$fila["tipoAnotaciones"].'</h4>';
            echo '<br/>';
            echo '<h4>NIA del alumno implicado:'.$fila["anotacion"].'</h4>';
            echo '<br/>';
            echo '<h4>Nombre del Alumno:'.$fila["nombreCompleto"].'</h4>';
            echo '<br/>';
            echo '<a href="anotaciones.php" class="btn btn-success " role="button">Volver</a> ';
        }
    }else{
        echo '<h1>No hay anotaciones que mostrar</h1>';
    }

}

?>