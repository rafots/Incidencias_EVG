<?php
session_start();

require '../procedimientos/procedimientos.php';
if(!isset($_SESSION["usuario"])){
    echo "Acceso prohibido";
}else{
    $conexion = new procedimientos();
    $conexion->conectar();
    $consulta_otras = "SELECT idIncidencia, incidencias.nia, incidencias.idTipo, incidencias.usuario, codAsignatura, incidencias.idHora, fecha_ocurrencia, fecha_registro, descripcion, leidaT, leidaC, archivadaT, archivadaC, alumnos.nombreCompleto, horas.nombre AS hora,profesores.nombre AS profe, tipo_incidencias.nombre AS nombreINC
	FROM  incidencias INNER JOIN alumnos
    	ON incidencias.nia = alumnos.nia
    INNER JOIN horas
    	ON incidencias.idHora = horas.idHora
    INNER JOIN profesores
    	ON incidencias.usuario = profesores.idUsuario
        INNER JOIN tipo_incidencias
        ON incidencias.idTipo = tipo_incidencias.idTipo
	WHERE (incidencias.idTipo >2 AND `archivadaC` = 0)";
    $conexion->consultas($consulta_otras);

}


if($conexion->numFilas() >0) {

    echo "
        <article class='col-md-12 articulo'>
            <table class='table table-striped'>
                <tr>
                    <td class='text-center'>Nombre del Alumnno</td>
                    <td class='text-center'>Tipo de incidencia</td>
                    <td class='text-center'>Profesor</td>
                    <td class='text-center'>Hora</td>
                    <td></td>
                </tr>
                <tr>";

    while ($fila = $conexion->devolverFilas()) {
        if ($fila["leidaC"] == 1) {
            echo "
                    <td class='text-center success'>" . $fila["nombreCompleto"] . "</td>
                    <td class='text-center success'>" . $fila["nombreINC"] . "</td>
                    <td class='text-center success'>" . $fila["profe"] . "</td>
                    <td class='text-center success'>" . $fila["hora"] . "</td>
                    <td><button type='button' class='btn btn-success btn-xs' data-toggle='modal' data-target='#Modal_" . $fila["idIncidencia"] . "'>
                        <span class='glyphicon glyphicon-eye-open'></span></button></td>
                </tr>";
        } else {
            echo "
                    <td class='text-center'>" . $fila["nombreCompleto"] . "</td>
                    <td class='text-center'>" . $fila["nombreINC"] . "</td>
                    <td class='text-center'>" . $fila["profe"] . "</td>
                    <td class='text-center'>" . $fila["hora"] . "</td>
                    <td><button type='button' class='btn btn-success btn-xs' data-toggle='modal' data-target='#Modal_" . $fila["idIncidencia"] . "'>
                        <span class='glyphicon glyphicon-eye-open'></span></button></td>
                </tr>";
        }
        echo "
                    
                    <!-- Modal -->
                    <div class='modal fade' id='Modal_" . $fila["idIncidencia"] . "' tabindex='-1' role='dialog' aria-labelledby='Modal_Label_" . $fila["idIncidencia"] . "'>
                        <div class='modal-dialog' role='document'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                                    <h4 class='modal-title' id='Modal_Label_" . $fila["idIncidencia"] . "'>Incidencia de " . $fila["nombreCompleto"] . "</h4>
                                </div>
                                <div class='modal-body'>";
        echo "
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
                                    <a class='btn btn-default' href='leerIncidenciaCoord.php?codigo=" . $fila["idIncidencia"] . "'>Marcar como leida</a>
                                    <a class='btn btn-default' href='archivarIncidenciaCoord.php?codigo=" . $fila["idIncidencia"] . "'>Archivar</a>
                                </div>
                            </div>
                        </div>
                    </div>";
        echo '</table>';
        echo '</div>';
    }
}

else
{
    echo 'No hay incidencias de otros tipos en este instante';
}

$conexion->cerrarConexion();
?>