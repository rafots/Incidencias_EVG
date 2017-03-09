<?php
    require_once "validaranotaciones.php";
echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>';
echo '<script src="../sources/ajax.js" type="text/javascript"></script>';
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
        echo'<table class="table table-bordered">
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