<?php
/**
 * Created by PhpStorm.
 * User: Jorge Luis
 * Date: 08/03/2017
 * Time: 22:41
 */

session_start();
if(!isset($_SESSION['usuario']))
    header('Location: iniciarSesion.html');
else {


    /*
     *
     * Proceso para generar un listado de las sancciones de aula de convivencia
     *
     */

    require '../procedimientos/procedimientos.php';

    $obj = new procedimientos();
    $obj->conectar();

    $today = date("Y-m-d");

    $sql = "SELECT sanciones.* , alumnos.nombreCompleto AS 'Alumno', motivo.motivo AS 'n_motivo'
        FROM sanciones INNER JOIN alumnos ON sanciones.nia = alumnos.nia 
        INNER JOIN tipo_sancion ON tipo_sancion.tipoSancion = sanciones.tipoSancion 
        INNER JOIN secciones ON secciones.idSeccion = alumnos.idSeccion 
        INNER JOIN motivo ON sanciones.idMotivo = motivo.idMotivo 
        WHERE tipo_sancion.nombre = 'Aula de convivencia' AND secciones.codEtapa = '".$_SESSION["codEtapa"]."' AND sanciones.fecha_inicio = '".$today."'";

    /*
     * 
     * Como el tipo de sanción de aula de convivencia siempre va a ser de los primero y va a tener siempre 
     * el mismo valor de puede poner directamente.
     * 
     */

    $obj->consultas($sql);

    if($obj->numFilas() > 0){

        echo '<h2>SANCIONES DEL AULA DE CONVIVENCIA</h2>';
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
            echo '<td><button class="btn btn-success btn-xs btn-mostrar-sancion" data-id-sancion="' .$row['idSancion'] . '"><i class="glyphicon glyphicon-eye-open"></i></button></td>';
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';

    }else{
        echo '<h1><small>Actualmente no hay sanciones de "Aula de convivencia" para el día de hoy</small></h1>';
    }

}