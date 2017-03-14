<?php

require_once "validaranotaciones.php";

echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>';
echo '<script type="text/javascript" src="../sources/ajax.js"></script>';

    function coordinador(){
        require_once "../consultas/crearanotaciones.php";

        visualizar($objeto);
    }

    function tutor(){
        require_once "../consultas/crearanotaciones.php";

        visualizar($objeto);
    }

    function visualizar($objeto)
    {

        date("Y-m-d H:i:s");

        echo ' <form action="crearanotaciones.php" method="post">';
        echo '<div class="form-group">
                                 
             </div>
             <div class="form-group">
             <label>Seccion</label>';
        echo '<select name="tipo" class="form-control" id="desplegable1">';
        echo '<option value>Seleccione una seccion</option>';
        while ($fila = $objeto->devolverfilas()) {
            echo '<option value="'.$fila["seccionid"].'">'.$fila["seccionid"].'</option>';
        }
        echo'</select>
        
        <div class="form-group" id="alumnos">      
        </div>
        <br><br>
        <label>Tipo al que pertenece</label>';
        require_once "../consultas/consultatipoanot.php";
        echo '<select name="desplegabletipo" id="tipo" class="form-control">';
        echo '<option value>Seleccione un tipo de anotacion</option>';
        while ($fila = $objeto->devolverfilas()) {
            echo '<option value="'.$fila["tipos"].'">'.$fila["nombre"].'</option>';
        }
        echo '</select>
        <div class="form-group">
        <label>Habilitar Profesores</label>
        <input type="checkbox" name="profesores" id="profesores">
        </div>
        <input class="btn btn-success" type="submit" name="boton" id="crearAnotacion" value="Crear anotacion">

   ';
    }
    ?>


