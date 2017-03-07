<?php
session_start();
require_once "../consultas/verIncidencia.php";

$fila = $conexion->devolverFilas();

if(!isset($_SESSION["usuario"])){
    echo "Acceso prohibido";
}else{
    echo "
    <article class='col-md-9 articulo'>
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
                            echo $fila["descripcion"];echo "
                        </textarea>
                    </div>                     
            </div>
            <div class='form-group text-right'>
                <a href='ultimasIncidenciasTutor.php' class='btn btn-primary'>Volver</a>
                <a href='leerIncidencia.php?codigo=" . $codigo . "' class='btn btn-primary'>Marcar como leida</a>
                <a href='archivarIncidencia.php?codigo=" . $codigo . "' class='btn btn-primary'>Archivar</a>
            </div>
        </form>
    </article>
";
}
?>