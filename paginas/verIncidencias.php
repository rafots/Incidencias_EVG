<?php
    session_start();
    require "../procedimientos/procedimientos.php";

    $conexion= new procedimientos();
    $conexion->conectar();

    $consulta_profesor="SELECT * FROM profesores WHERE usuario='".$_SESSION["usuario"]."'";
    $conexion->consultas($consulta_profesor);
    $fila_profesor=$conexion->devolverFilas();

    $consulta_inc="SELECT alumnos.nombreCompleto AS alumno, tipo_incidencias.nombre as incidencia, codAsignatura as asignatura, horas.nombre as hora, fecha_ocurrencia as fecha1, fecha_registro as fecha2, descripcion
	FROM incidencias INNER JOIN alumnos
        ON incidencias.nia=alumnos.nia
        INNER JOIN tipo_incidencias
        ON tipo_incidencias.idTipo=incidencias.idTipo
        INNER JOIN horas
        ON incidencias.idHora=horas.idHora
    WHERE usuario=".$fila_profesor["idUsuario"]."";
    $conexion->consultas($consulta_inc);
    echo '<h3>Ver incidencias escritas</h3>';
    if($fila_inc=$conexion->devolverFilas())
    {
        echo '<table class="table table-striped">';
        echo '<thead>';
        echo '<tr>';
        echo '<th>Alumno</th>';
        echo '<th>Tipo de incidencia</th>';
        echo '<th>Asignatura</th>';
        echo '<th>Hora</th>';
        echo '<th>Fecha de la incidencia</th>';
        echo '<th>Fecha registrada</th>';
        echo '<th>Descripcion</th>';
        echo '</tr>';
        echo '<thead>';
        echo '<tbody>';
        echo '<tr>';
        echo '<td>'.$fila_inc["alumno"].'</td>';
        echo '<td>'.$fila_inc["incidencia"].'</td>';
        echo '<td>'.$fila_inc["asignatura"].'</td>';
        echo '<td>'.$fila_inc["hora"].'</td>';
        echo '<td>'.$fila_inc["fecha1"].'</td>';
        echo '<td>'.$fila_inc["fecha2"].'</td>';
        echo '<td>'.$fila_inc["descripcion"].'</td>';

        echo '</tr>';
        if(!empty($fila_inc)) {
            while ($fila_inc = $conexion->devolverFilas()) {
                echo '<tr>';
                echo '<td>' . $fila_inc["alumno"] . '</td>';
                echo '<td>' . $fila_inc["incidencia"] . '</td>';
                echo '<td>' . $fila_inc["asignatura"] . '</td>';
                echo '<td>' . $fila_inc["hora"] . '</td>';
                echo '<td>' . $fila_inc["fecha1"] . '</td>';
                echo '<td>' . $fila_inc["fecha2"] . '</td>';
                echo '<td>' . $fila_inc["descripcion"] . '</td>';
                echo '</tr>';
            }
        }
        echo '</tbody>';
        echo '</table>';
    }
    else
    {
        echo '<p>No has escrito todavía ninguna incidencia</p>';
    }
?>