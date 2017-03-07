<?php
    session_start();
    require_once "../procedimientos/procedimientos.php";
    require_once "../consultas/ultimasIncidencias.php";

    if(!isset($_SESSION["usuario"])){
        echo "Acceso prohibido";
    }else{
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
                while($fila = $conexion->devolverFilas()){echo "
                    <td class='text-center'>".$fila["nombreCompleto"]."</td>
                    <td class='text-center'>".$fila["nombreINC"]."</td>
                    <td class='text-center'>".$fila["nombrePROF"]."</td>
                    <td>
                    <button type='button' class='btn btn-success btn-xs' data-toggle='modal' data-target='#Modal_".$fila["idIncidencia"]."'>
                        <span class='glyphicon glyphicon-eye-open'></span>
                    </button>
                    <!--<a href='verIncidencia.php?codigo=".$fila["idIncidencia"]."' class='btn btn-primary'></a>-->
                    </td>
                    <!--<td><a href='#' class='btn btn-primary'><span class='glyphicon glyphicon-folder-open'></span></a></td>-->
                                <!-- Modal -->
                    <div class='modal fade' id='Modal_".$fila["idIncidencia"]."' tabindex='-1' role='dialog' aria-labelledby='Modal_Label_".$fila["idIncidencia"]."'>
                      <div class='modal-dialog' role='document'>
                        <div class='modal-content'>
                          <div class='modal-header'>
                            <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                            <h4 class='modal-title' id='Modal_Label_".$fila["idIncidencia"]."'>Modal title</h4>
                          </div>
                          <div class='modal-body'>";

                        echo "
                        <article class='col-md-12 articulo'>
                            <form class='form-horizontal'>
                                <div class='form-group'>
                                    <label for='alumno' class='col-lg-3 control-label'>Alumno:</label>
                                        <div class='col-lg-8'>
                                            <input type='text' class='form-control' id='alumno' value='" . $fila["nombreCompleto"] . "' disabled>
                                        </div>
                                </div>
                                <div class='form-group'>
                                    <label for='alumno' class='col-lg-3 control-label'>Tipo de incidencia:</label>
                                        <div class='col-lg-8'>
                                            <input type='text' class='form-control' id='alumno' value='" . $fila["nombreINC"] . "' disabled>
                                        </div>
                                </div>
                                    <div class='form-group'>
                                        <label for='alumno' class='col-lg-3 control-label'>Profesor:</label>
                                            <div class='col-lg-8'>
                                                <input type='text' class='form-control' id='alumno' value='" . $fila["nombrePROF"] . "' disabled>
                                            </div>
                                    </div>
                                <div class='form-group'>
                                    <label for='alumno' class='col-lg-3 control-label'>Asignatura:</label>
                                        <div class='col-lg-8'>
                                            <input type='text' class='form-control' id='alumno' value='" . $fila["codAsignatura"] . "' disabled>
                                        </div>
                                </div>
                                <div class='form-group'>
                                    <label for='alumno' class='col-lg-3 control-label'>Fecha:</label>
                                        <div class='col-lg-8'>
                                            <input type='text' class='form-control' id='alumno' value='" . $fila["fecha_ocurrencia"] . "' disabled>
                                        </div>
                                </div>
                                <div class='form-group'>
                                    <label for='alumno' class='col-lg-3 control-label'>Hora:</label>
                                        <div class='col-lg-8'>
                                            <input type='text' class='form-control' id='alumno' value='" . $fila["nombreHora"] . "' disabled>
                                        </div>
                                </div>
                                <div class='form-group'>
                                    <label for='descripcion' class='col-lg-3 control-label'>Descripcion:</label>
                                        <div class='col-lg-8'>
                                            <textarea class='form-control' rows='5' id='descripcion' disabled>";
                                                echo $fila["descripcion"];
                    echo "
                                            </textarea>
                                        </div>
                                </div>
                                
                            </form>
                        </article>
                          </div>
                          <div class='modal-footer'>
                            <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                            <div class='form-group text-right'>
                                <a href='ultimasIncidenciasTutor.php' class='btn btn-primary'>Volver</a>
                                <a href='leerIncidencia.php?codigo=" . $codigo . "' class='btn btn-primary'>Marcar como leida</a>
                                <a href='archivarIncidencia.php?codigo=" . $codigo . "' class='btn btn-primary'>Archivar</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>";
                }
        echo "
                </tr>
             </table>

        </article>
    </body>";}