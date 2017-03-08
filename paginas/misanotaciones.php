<?php
require_once "validaranotaciones.php";

function coordinador(){
    require "consultamianotacioncoord.php";

    visualizar($objeto);
}

function tutor(){
    require "consultamianotaciontutor.php";

    visualizar($objeto);
}

function visualizar($objeto){

    echo'<table class="table table-bordered">
         <caption>Mis Anotaciones</caption>
        <tr>
           <th>Tipo de anotacion:</th>
           <th>Descripcion de la anotacion:</th>
           <th>NIA del alumno implicado:</th>
           <th>Nombre del Alumno:</th>  
        </tr>';
    while($fila=$objeto->devolverfilas()) {
        echo'<tr>';
        echo '<th>'.$fila["numAnotacion"] . '</th>';
        echo '<th>'.$fila["tipoAnotaciones"].'</th>';
        echo '<th>'.$fila["anotacion"] . '</th>';
        echo '<th>'.$fila["nombreCompleto"] . '</th>';
        echo'</tr>';
        echo'<tr>
                <th colspan="5"><a id="anotacionesmostrar">Ver la anotacion en detalle</a></th>
             </tr>';
    }

    echo'</table>';
}

?>