<?php
session_start();
/**
 * Created by PhpStorm.
 * User: Rafa
 * Date: 08/03/2017
 * Time: 0:52
 */
require '../procedimientos/procedimientos.php';
if(!isset($_SESSION["usuario"])){
    echo "Acceso prohibido";
}else{
    $obj = new procedimientos();
    $obj->conectar();
    $query = 'SELECT t1.*,t2.nombreCompleto,t3.nombre AS hora,t4.nombre AS profe,t7.nombre AS nombreINC
	FROM  incidencias t1 INNER JOIN alumnos t2
    	ON t1.nia = t2.nia
    INNER JOIN horas t3
    	ON t1.idHora = t3.idHora
    INNER JOIN profesores t4
    	ON t1.usuario = t4.idUsuario
        INNER JOIN secciones t5 
        ON t5.idSeccion = t2.idSeccion
        INNER JOIN etapas t6 
        ON t6.codEtapa = t5.codEtapa
        INNER JOIN tipo_incidencias t7
        ON t7.idTipo = t1.idTipo
	WHERE t1.idTipo = 2 AND `archivadaC` = 0 AND t5.codEtapa = "'.$_SESSION["codEtapa"].'"';
    $obj->consultas($query);

}


if($obj->numFilas()>0)
{
    echo "
        <article class='col-md-12 articulo'>
            <table class='table table-striped'>
                <tr>
                    <td class='text-center'>Nombre del Alumnno</td>
                    <td class='text-center'>Tipo de incidencia</td>
                    <td class='text-center'>Profesor</td>
                    <td></td>
                </tr>
                <tr>";
    while($fila = $obj->devolverFilas())
    {
        if($fila["leidaC"] == 1){echo"
                    <td class='text-center success'>".$fila["nombreCompleto"]."</td>
                    <td class='text-center success'>".$fila["nombreINC"]."</td>
                    <td class='text-center success'>".$fila["profe"]."</td>
                    <td><button type='button' class='btn btn-success btn-xs' data-toggle='modal' data-target='#Modal_".$fila["idIncidencia"]."'>
                        <span class='glyphicon glyphicon-eye-open'></span></button></td>
                </tr>";
        }else{echo "
                    <td class='text-center'>".$fila["nombreCompleto"]."</td>
                    <td class='text-center'>".$fila["nombreINC"]."</td>
                    <td class='text-center'>".$fila["profe"]."</td>
                    <td><button type='button' class='btn btn-success btn-xs' data-toggle='modal' data-target='#Modal_".$fila["idIncidencia"]."'>
                        <span class='glyphicon glyphicon-eye-open'></span></button></td>
                </tr>";
        }echo"
                    
                    <!-- Modal -->
                    <div class='modal fade' id='Modal_".$fila["idIncidencia"]."' tabindex='-1' role='dialog' aria-labelledby='Modal_Label_".$fila["idIncidencia"]."'>
                        <div class='modal-dialog' role='document'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                                    <h4 class='modal-title' id='Modal_Label_".$fila["idIncidencia"]."'>Incidencia de ".$fila["nombreCompleto"]."</h4>
                                </div>
                                <div class='modal-body'>";echo "
                                    <form class='form-horizontal'>
                                        <div class='form-group'>
                                            <label for='alumno' class='col-md-3 control-label'>Alumno:</label>
                                                <div class='col-lg-12'>
                                                    <input type='text' class='form-control' id='alumno' value='" . $fila["nombreCompleto"] . "' disabled>
                                                </div>
                                        </div>
                                        <div class='form-group'>
                                            <label for='alumno' class='col-lg-12 control-label'>Tipo de incidencia:</label>
                                                <div class='col-lg-12'>
                                                    <input type='text' class='form-control' id='alumno' value='" . $fila["nombreINC"] . "' disabled>
                                                </div>
                                        </div>
                                        <div class='form-group'>
                                            <label for='alumno' class='col-md-12 control-label'>Profesor:</label>
                                                <div class='col-lg-12'>
                                                    <input type='text' class='form-control' id='alumno' value='" . $fila["profe"] . "' disabled>
                                                </div>
                                        </div>
                                        <div class='form-group'>
                                            <label for='alumno' class='col-md-12 control-label'>Asignatura:</label>
                                                <div class='col-lg-12'>
                                                    <input type='text' class='form-control' id='alumno' value='" . $fila["codAsignatura"] . "' disabled>
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
                                                    <input type='text' class='form-control' id='alumno' value='" . $fila["hora"] . "' disabled>
                                                </div>
                                        </div>
                                        <div class='form-group'>
                                            <label for='descripcion' class='col-md-12 control-label'>Descripcion:</label>
                                                <div class='col-lg-12'>
                                                    <textarea class='form-control' rows='5' id='descripcion' disabled>";
        echo $fila["descripcion"];
        echo "
                                                    </textarea>
                                                </div>
                                        </div>
                                    </form>
                                </div>
                                <div class='modal-footer'>
                                    <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                    <a class='btn btn-default' href='leerIncidenciaCoord.php?codigo=".$fila["idIncidencia"]."'>Marcar como leida</a>
                                    <a class='btn btn-default' href='archivarIncidenciaCoord.php?codigo=".$fila["idIncidencia"]."'>Archivar</a>
                                </div>
                            </div>
                        </div>
                    </div>";
        echo '</table>';
        echo '</div>';
    }
}
else{
    echo 'No hay partes educativos a mostrar';
}


$obj->cerrarConexion();