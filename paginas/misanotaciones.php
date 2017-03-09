<?php
require_once "validaranotaciones.php";

function coordinador(){
    require "../consultas/consultamianotacioncoord.php";

    visualizar($objeto);
}

function tutor(){
    require "../consultas/consultamianotaciontutor.php";

    visualizar($objeto);
}

function visualizar($objeto){
    echo'<table class="table table-bordered">
         <caption>Mis Anotaciones</caption>
        <tr>
           <th>Descripcion de la anotacion:</th>
           <th>Nombre del Alumno:</th>  
        </tr>';
    while($fila=$objeto->devolverfilas()) {
        echo'<tr>';
        echo '<th>'.$fila["tipoAnotaciones"].'</th>';
        echo '<th>'.$fila["nombreCompleto"] . '</th>';
        echo'</tr>';
        echo'<tr>
                <th colspan="5"><a id="anotacionesmostrar">Ver la anotacion en detalle</a></th>
             </tr>';
    }

    echo'</table>';
}

?>