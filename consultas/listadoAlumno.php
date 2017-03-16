<?php
    require "../procedimientos/procedimientos.php";
    $conexion = new procedimientos();
    $conexion->conectar();
    $consulta_alumnos="SELECT * FROM alumnos WHERE idSeccion='".$_POST["seccion"]."'";
    $conexion->consultas($consulta_alumnos);
    echo '<label>Alumno</label>';

    if($fila_alumnos=$conexion->devolverFilas()){
        echo '<select name="nia" required="required" class="form-control">';
        echo '<option value="'.$fila_alumnos["nia"].'">'.$fila_alumnos["nombreCompleto"].'</option>';
        if(!empty($fila_alumnos)){
            while($fila_alumnos=$conexion->devolverFilas()){
                echo '<option value="'.$fila_alumnos["nia"].'">'.$fila_alumnos["nombreCompleto"].'</option>';
            }
        }
        echo '</select>';
        $consulta_sec="SELECT * FROM secciones WHERE idSeccion='".$_POST["seccion"]."'";
        $conexion->consultas($consulta_sec);
        $fila_secciones=$conexion->devolverFilas();

        $consulta_etapa="SELECT * FROM etapas WHERE codEtapa='".$fila_secciones["codEtapa"]."'";
        $conexion->consultas($consulta_etapa);
        $fila_etapa=$conexion->devolverFilas();

        $consulta_tipos="SELECT * FROM tipo_incidencias WHERE codEtapa='".$fila_etapa["codEtapa"]."'";
        $conexion->consultas($consulta_tipos);
        echo '<label>Tipo de incidencia</label>';

        if($fila_inc=$conexion->devolverFilas()){
            echo '<select name="tipo_inc" class="form-control" required="required">';
            echo '<option value="'.$fila_inc["idTipo"].'">'.$fila_inc["nombre"].'</option>';
            if(!empty($fila_inc)){
                while($fila_inc=$conexion->devolverFilas()){
                    echo '<option value="'.$fila_inc["idTipo"].'">'.$fila_inc["nombre"].'</option>';
                }
            }
            echo '</select>';
        }
        else
        {
            '<p>No hay tipos de incidencias, selecciona otra seccion</p>';
        }


    }
    else
    {
        echo '<p>Esta seccion no tiene alumnos. Por favor, selecciona otra seccion</p>';
    }




?>