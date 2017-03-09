<?php
/**
 * Created by PhpStorm.
 * User: Jorge Luis
 * Date: 09/03/2017
 * Time: 20:17
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

    //$today = date("Y-m-d");

    $sql = "SELECT sanciones.idSancion AS ID, tipo_sancion.nombre AS tipoSancion, sanciones.fecha_inicio AS fecha_inicio, 
        sanciones.fecha_fin AS fecha_fin FROM sanciones 
        INNER JOIN tipo_sancion ON sanciones.tipoSancion = tipo_sancion.tipoSancion 
        INNER JOIN tipo_sancion_incidencias ON sanciones.tipoSancion = tipo_sancion_incidencias.tipoSancion 
        INNER JOIN tipo_incidencias ON tipo_sancion_incidencias.idTipo = tipo_incidencias.idTipo 
        WHERE tipo_incidencias.codEtapa = '".$_SESSION["codEtapa"]."'";

    /*
     *
     * Como el tipo de sanción de aula de convivencia siempre va a ser de los primero y va a tener siempre
     * el mismo valor de puede poner directamente.
     *
     */

    $obj->consultas($sql);

    if($obj->numFilas() > 0){

        echo '<h2>LISTADO DE SANCIONES</h2>';
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
            echo '<td><a class="btn btn-success" href="#"><span class="glyphicon glyphicon-cog"></span></a></td>';
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';



    }else{
        echo '<h1><small>Actualmente no hay sanciones</small></h1>';
    }

}