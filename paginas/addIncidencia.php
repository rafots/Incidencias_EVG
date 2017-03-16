<?php
    require "../procedimientos/procedimientos.php";
    $conexion = new procedimientos();
    $conexion->conectar();

    echo '<div>';
        echo '<h3>Añadir incidencia</h3>';
        echo '<form method="post" class="form-horizontal" action="../consultas/conAddIncidencia.php">';
        echo '<div id="div_alumno">';
        echo '<label>Seccion</label>';
        echo '<select name="seccion" class="form-control" id="id_sec" required="required">';
        require '../consultas/addIncidencia/listadoSecciones.php';
        echo '</select>';

        echo '</div>';
        echo '<div id="div_alumno2">';

        echo '</div>';
        echo '<div>';
        echo '<label>Tipo de incidencia</label>';
        echo '<select name="tipo_inc" class="form-control" id="sel1" required="required">';
        require "../consultas/addIncidencia/listadoTipoInc.php";
        echo '</select>';
        echo '</div>';
        echo '<div>';
        echo '<label>Asignatura</label>';
        echo '<input type="text" name="asignatura" class="form-control"/>';
        echo '</div>';
        echo '<div>';
        echo '<label>Fecha de la incidencia</label>';
        echo '<input type="date" name="fecha_incidencia" class="form-control" required="required" value="'.date("Y-m-d").'"/>';
        echo '</div>';
        echo '<div>';
        echo '<label>Hora</label>';
        echo '<select name="hora" class="form-control" id="sel1" required="required">';
        require "../consultas/addIncidencia/listadoHoras.php";
        echo '</select>';
        echo '</div>';
        echo '<div>';
        echo '<label>Descripción de la incidencia</label>';
        echo '<textarea name="descripcion" required="required" class="form-control"/>';
        echo '</div>';
        echo '<div>';
        echo '<input type="submit" value="Enviar incidencia" class="btn btn-primary buttons-separator"/>';
        echo '</div>';
        echo '</form>';
    echo '</div>';
?>
