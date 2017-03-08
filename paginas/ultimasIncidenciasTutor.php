<?php
    session_start();
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
                    <td><button type='button' class='btn btn-success btn-xs' data-toggle='modal' data-target='#Modal_".$fila["idIncidencia"]."'>
                        <span class='glyphicon glyphicon-eye-open'></span></button></td>
                </tr>
                    
                    <!-- Modal -->
                    <div class='modal fade' id='Modal_".$fila["idIncidencia"]."' tabindex='-1' role='dialog' aria-labelledby='Modal_Label_".$fila["idIncidencia"]."'>
                        <div class='modal-dialog' role='document'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                                    <h4 class='modal-title' id='Modal_Label_".$fila["idIncidencia"]."'>Modal title</h4>
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
                                                    <input type='text' class='form-control' id='alumno' value='" . $fila["nombrePROF"] . "' disabled>
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
                                                    <input type='text' class='form-control' id='alumno' value='" . $fila["nombreHora"] . "' disabled>
                                                </div>
                                        </div>
                                        <div class='form-group'>
                                            <label for='descripcion' class='col-md-12 control-label'>Descripcion:</label>
                                                <div class='col-lg-12'>
                                                    <textarea class='form-control' rows='5' id='descripcion' disabled>";
                                                        echo $fila["descripcion"];echo "
                                                    </textarea>
                                                </div>
                                        </div>
                                    </form>
                                </div>
                                <div class='modal-footer'>
                                    <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                    <a class='btn btn-default' data-dismiss='modal' href='leerIncidencia.php?codigo=".$fila["idIncidencia"]."'>Marcar como leida</a>
                                    <a class='btn btn-default' data-dismiss='modal' href='archivarIncidencia.php?codigo=".$fila["idIncidencia"]."'>Archivar</a>
                                </div>
                            </div>
                        </div>
                    </div>";
                }
        echo "
                
             </table>
        </article>
    </body>";
    }