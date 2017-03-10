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

    $sql = "SELECT sanciones.* , alumnos.nombreCompleto AS 'Alumno', motivo.motivo AS 'n_motivo'
        FROM sanciones INNER JOIN incidencias ON sanciones.idIncidencia = incidencias.idIncidencia
        INNER JOIN alumnos ON alumnos.nia = sanciones.nia
        INNER JOIN secciones ON secciones.idSeccion = alumnos.idSeccion
        INNER JOIN horas ON horas.idHora = incidencias.idHora
        INNER JOIN motivo ON motivo.idMotivo = sanciones.idMotivo
        WHERE incidencias.idHora = 9 AND secciones.codEtapa = '".$_SESSION["codEtapa"]."' AND sanciones.fecha_inicio = '".$today."'";

    $obj->consultas($sql);

    if($obj->numFilas() > 0){

        echo '<h2>SANCIONES DE ULTIMA HORA</h2>';
        echo '<table class="table table-striped table-responsive">
            <thead>
                <tr>
                    <th>Alumno</th>
                    <th>Motivo</th>
                    <th>Fecha</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            ';

        while ($row = $obj->devolverFilas()) {
            echo '<tr>';
            echo '<td>' . $row['Alumno'] . '</td>';
            echo '<td>' . $row['n_motivo'] . '</td>';
            echo '<td>' . $row['fecha_inicio'] . '</td>';
            echo '<td><a class="btn btn-success btn-xs" href="#"><span class="glyphicon glyphicon-eye-open"></span></a></td>';
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';

    }else{
        echo '<h1><small>Actualmente no hay sanciones de "última hora" para el día de hoy</small></h1>';
    }
}