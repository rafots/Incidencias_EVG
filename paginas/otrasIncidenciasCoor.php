<?php
    include "../procedimientos/procedimientos.php";

    $conexion = new procedimientos();
    $conexion->conectar();

    $consulta_incidencias="SELECT alumnos.nombreCompleto AS nombreAlumno, tipo_incidencias.nombre AS tipoincidencia, incidencias.codAsignatura as asignatura, horas.nombre as hora, incidencias.fecha_registro as fecha, incidencias.descripcion as descripcion, profesores.nombre as nombreUsuario
	FROM incidencias INNER JOIN tipo_incidencias
    	ON incidencias.idTipo=tipo_incidencias.idTipo
        INNER JOIN alumnos
        ON incidencias.nia=alumnos.nia
        INNER JOIN horas
        ON incidencias.idHora=horas.idHora
        INNER JOIN profesores
        ON profesores.idUsuario=incidencias.usuario
    	WHERE incidencias.idTipo!=1 AND incidencias.idTipo!=2";
    $conexion->consultas($consulta_incidencias);
    if($fila_tabla=$conexion->devolverFilas())
    {
        echo '<table class="table table-striped">';
        echo '<thead>';
        echo '<tr>';
        echo '<th>Nombre del alumno</th>';
        echo '<th>Redactado por</th>';
        echo '<th>Tipo de incidencia</th>';
        echo '<th>Asignatura</th>';
        echo '<th>Hora</th>';
        echo '<th>Fecha</th>';
        echo '<th>Descripcion</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        echo '<tr>';
        echo '<td>'.$fila_tabla["nombreAlumno"].'</td>';
        echo '<td>'.$fila_tabla["nombreUsuario"].'</td>';
        echo '<td>'.$fila_tabla["tipoincidencia"].'</td>';
        echo '<td>'.$fila_tabla["asignatura"].'</td>';
        echo '<td>'.$fila_tabla["hora"].'</td>';
        echo '<td>'.$fila_tabla["fecha"].'</td>';
        echo '<td>'.$fila_tabla["descripcion"].'</td>';
        echo '</tr>';
        if(!empty($fila_tabla)){
            while($fila_tabla=$conexion->devolverFilas())
            {
                echo '<tr>';
                echo '<td>'.$fila_tabla["nombreAlumno"].'</td>';
                echo '<td>'.$fila_tabla["nombreUsuario"].'</td>';
                echo '<td>'.$fila_tabla["tipoincidencia"].'</td>';
                echo '<td>'.$fila_tabla["asignatura"].'</td>';
                echo '<td>'.$fila_tabla["hora"].'</td>';
                echo '<td>'.$fila_tabla["fecha"].'</td>';
                echo '<td>'.$fila_tabla["descripcion"].'</td>';
                echo '</tr>';
            }
        }
        echo '</tbody>';
        echo '</table>';
    }

?>