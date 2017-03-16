<?php
    require "../procedimientos/procedimientos.php";
    $conexion = new procedimientos();
    $conexion->conectar();
    $consulta_alumnos="SELECT * FROM alumnos WHERE idSeccion='".$_POST["seccion"]."'";
    $conexion->consultas($consulta_alumnos);
    echo '<label>Alumno</label>';

    if($fila_alumnos=$conexion->devolverFilas()){
        echo '<select name="nia" class="form-control">';
        echo '<option value="'.$fila_alumnos["nia"].'">'.$fila_alumnos["nombreCompleto"].'</option>';
        if(!empty($fila_alumnos)){
            while($fila_alumnos=$conexion->devolverFilas()){
                echo '<option value="'.$fila_alumnos["nia"].'">'.$fila_alumnos["nombreCompleto"].'</option>';
            }
        }
        echo '</select>';
    }
    else
    {
        echo '<p>Esta seccion no tiene alumnos. Por favor, selecciona otra seccion</p>';
    }



?>