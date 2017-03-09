<?php
/**
 * Created by PhpStorm.
 * User: Jorge Luis
 * Date: 08/03/2017
 * Time: 22:20
 */

session_start();
if(!isset($_SESSION['usuario']))
    header('Location: iniciarSesion.html');
else {


    /*
     *
     * Proceso para generar un listado de las sancciones de ultima hora (7ª hora)
     *
     */

    require '../procedimientos/procedimientos.php';

    $obj = new procedimientos();
    $obj->conectar();

    $today = date("Y-m-d");

    $sql = "SELECT sanciones.idSancion AS 'ID', alumnos.nombreCompleto AS 'Alumno', profesores.nombre AS 'Profesor', incidencias.codAsignatura AS 'Asignatura'
        FROM sanciones INNER JOIN incidencias ON sanciones.idIncidencia = incidencias.idIncidencia
        INNER JOIN alumnos ON alumnos.nia = incidencias.nia
        INNER JOIN profesores ON profesores.idUsuario = incidencias.usuario
        INNER JOIN tipo_incidencias ON incidencias.idTipo = tipo_incidencias.idTipo
        WHERE incidencias.idHora = 9 AND tipo_incidencias.codEtapa = '".$_SESSION["codEtapa"]."' AND sanciones.fecha_inicio = '".$today."'";

    $obj->consultas($sql);

    if($obj->numFilas() > 0){

        echo '<h2>SANCIONES DE ULTIMA HORA</h2>';
        echo '<table class="table table-striped table-responsive">
            <thead>
                <tr>
                    <th>Alumno</th>
                    <th>Profesor</th>
                    <th>Asignatura</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            ';

        while ($row = $obj->devolverFilas()) {
            echo '<tr>';
            echo '<td>' . $row['Alumno'] . '</td>';
            echo '<td>' . $row['Profesor'] . '</td>';
            echo '<td>' . $row['Asignatura'] . '</td>';
            echo '<td><a class="btn btn-success" href="#"><span class="glyphicon glyphicon-eye-open"></span></a></td>';
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';

    }else{
        echo '<h1><small>Actualmente no hay sanciones de "última hora" para el día de hoy</small></h1>';
    }
}