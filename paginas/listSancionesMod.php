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
                    <th></th>
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
            echo '<td><button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#Modal_'.$row["idSancion"].'">
                        <span class="glyphicon glyphicon-eye-open"></span></button></td>';
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';

        /*
         *
         * -------------- MODAL ----------------
         *
         */

        echo"
                    
                    <div class='modal fade' id='Modal_".$row["idSancion"]."' tabindex='-1' role='dialog' aria-labelledby='Modal_Label_".$row["idSancion"]."'>
                        <div class='modal-dialog' role='document'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                                    <h4 class='modal-title' id='Modal_Label_".$row["idSancion"]."'>Incidencia de ".$row["idSancion"]."</h4>
                                </div>
                                <div class='modal-body'>";echo "
                                    <form class='form-horizontal'>
                                        <div class='form-group'>
                                            <label for='alumno' class='col-md-3 control-label'>Alumno:</label>
                                                <div class='col-lg-12'>
                                                    <input type='text' class='form-control' id='alumno' value='" . $row["alumno"] . "' disabled>
                                                </div>
                                        </div>
                                        <div class='form-group'>
                                            <label for='alumno' class='col-lg-12 control-label'>Tipo de incidencia:</label>
                                                <div class='col-lg-12'>
                                                    <input type='text' class='form-control' id='alumno' value='" . $row["tipoSancion"] . "' disabled>
                                                </div>
                                        </div>
                                        <div class='form-group'>
                                            <label for='alumno' class='col-md-12 control-label'>Profesor:</label>
                                                <div class='col-lg-12'>
                                                    <input type='text' class='form-control' id='alumno' value='" . $row["nombrePROF"] . "' disabled>
                                                </div>
                                        </div>
                                        <div class='form-group'>
                                            <label for='alumno' class='col-md-12 control-label'>Asignatura:</label>
                                                <div class='col-lg-12'>
                                                    <input type='text' class='form-control' id='alumno' value='" . $row["codAsignatura"] . "' disabled>
                                                </div>
                                        </div>
                                        <div class='form-group'>
                                            <label for='alumno' class='col-md-12 control-label'>Fecha:</label>
                                                <div class='col-lg-12'>
                                                    <input type='text' class='form-control' id='alumno' value='" . $fila["fecha_ocurrencia"] . "' disabled>
                                                </div>
                                        </div>
                                        <div class='form-group'>
                                            <label for='alumno' class='col-md-12 control-label'>Hora:</label>
                                                <div class='col-lg-12'>
                                                    <input type='text' class='form-control' id='alumno' value='" . $row["nombreHora"] . "' disabled>
                                                </div>
                                        </div>
                                        <div class='form-group'>
                                            <label for='descripcion' class='col-md-12 control-label'>Descripcion:</label>
                                                <div class='col-lg-12'>
                                                    <textarea class='form-control' rows='5' id='descripcion' disabled>";
                                                    echo $row["descripcion"];echo "
                                                    </textarea>
                                                </div>
                                        </div>
                                    </form>
                                </div>
                                <div class='modal-footer'>
                                    <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                    <a class='btn btn-default' href='leerIncidencia.php?codigo=".$fila["idIncidencia"]."'>Marcar como leida</a>
                                    <a class='btn btn-default' href='archivarIncidencia.php?codigo=".$fila["idIncidencia"]."'>Archivar</a>
                                </div>
                            </div>
                        </div>
                    </div>";

        /*
         *
         * -------------- /MODAL ----------------
         *
         */

    }else{
        echo '<h1><small>Actualmente no hay sanciones</small></h1>';
    }


}