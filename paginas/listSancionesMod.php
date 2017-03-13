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
     * Proceso para generar un listado de las sancciones
     *
     */

    require '../procedimientos/procedimientos.php';

    $obj = new procedimientos();
    $obj->conectar();

    //$today = date("Y-m-d");

    if($_SESSION["activa"]=='c'){

        $sql = "SELECT sanciones.* , alumnos.nombreCompleto AS alumno, tipo_sancion.nombre AS tipoSancion FROM sanciones 
        INNER JOIN tipo_sancion ON sanciones.tipoSancion = tipo_sancion.tipoSancion 
        INNER JOIN alumnos ON alumnos.nia = sanciones.nia 
        INNER JOIN secciones ON alumnos.idSeccion = secciones.idSeccion 
        WHERE secciones.codEtapa = '".$_SESSION["codEtapa"]."' 
        ORDER BY fecha_inicio";
        
    }else{

        $sql = "SELECT sanciones.* , alumnos.nombreCompleto AS alumno, tipo_sancion.nombre AS tipoSancion FROM sanciones 
        INNER JOIN alumnos ON sanciones.nia = alumnos.nia
        INNER JOIN tipo_sancion ON sanciones.tipoSancion = tipo_sancion.tipoSancion
        INNER JOIN secciones ON secciones.idSeccion = alumnos.idSeccion
        WHERE secciones.idSeccion = '".$_SESSION["idSeccion"]."'
        ORDER BY fecha_inicio";

    }
    

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
                    <th>Tipo de sanción</th>
                    <th>Fecha inicio</th>
                    <th>Fecha fin</th>
                    <th colspan="2"></th>
                </tr>
            </thead>
            <tbody>
            ';

        while ($row = $obj->devolverFilas()) {
            echo '<tr>';
            echo '<td>' . $row['alumno'] . '</td>';
            echo '<td>' . $row['tipoSancion'] . '</td>';
            echo '<td>' . $row['fecha_inicio'] . '</td>';
            echo '<td>' . $row['fecha_fin'] . '</td>';
            echo '<td><button class="btn btn-success btn-xs btn-ver-sancion" data-id-sancion="' .$row['idSancion'] . '"><i class="glyphicon glyphicon-eye-open"></i></button></td>';
            echo '<td><button class="btn btn-success btn-xs btn-delete-sancion" data-id-sancion="' .$row['idSancion'] . '"><i class="glyphicon glyphicon-trash"></i></button></td>';
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';

        

    }else{
        echo '<h1><small>Actualmente no hay sanciones</small></h1>';
    }


}