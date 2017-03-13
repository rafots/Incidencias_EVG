<?php
/**
 * Created by PhpStorm.
 * User: Jorge Luis
 * Date: 13/03/2017
 * Time: 22:54
 */

session_start();
if(!isset($_SESSION['usuario']))
    header('Location: iniciarSesion.php');
else{

    echo '<script type="text/javascript" src="../sources/comun.js"></script>';

    require_once '../consultas/buscarSancion.php';

    $row_sancion = $sancion->devolverFilas();

    echo '
    
        <form class="form-horizontal" name="formAddSancion" id="formAddSancion" method="post" action="../consultas/modSancion.php">
            <div class="form-group">
                <label for="student" class="col-md-3 control-label">Alumno</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" value="'.$row_sancion['nombreAlumno'].'" name="student" id="student" disabled/>
                </div>
            </div>

            <div class="form-group">
                <label for="sanction-type" class="col-md-3 control-label">Tipo de sanción</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" value="'.$row_sancion['nombreSancion'].'" name="sanction-type" id="sanction-type" disabled/>
                </div>
            </div>
            <div class="form-group">
                <label for="reason-type" class="col-md-3 control-label">Motivo</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" value="'.$row_sancion['nombreMotivo'].'" name="reason-type" id="sanction-type" disabled/>
                </div>
            </div>
    
    
            <div class="form-group">
                <label for="initial-date" class="col-md-3 control-label">Fecha de inicio</label>
                <div class="col-sm-8">
                    <input type="date" class="form-control" value="'.$row_sancion['fecha_inicio'].'" name="initial-date" id="initial-date" disabled/>
                </div>
            </div>
            
            <div class="form-group">
                <label for="end-date" class="col-md-3 control-label">Fecha de fin</label>
                <div class="col-sm-8">
                    <input type="date" class="form-control" value="'.$row_sancion['fecha_fin'].'" name="end-date" id="end-date" disabled/>
                </div>
            </div>
            
            <div class="form-group">
                <label for="end-date" class="col-md-3 control-label">Observaciones</label>
                <div class="col-sm-8">
                    <textarea class="form-control" rows="5" name="observations" id="observations" placeholder="Observaciones de la sanción" disabled>'.$row_sancion['observacion'].'</textarea>
                </div>
            </div>
        
        </form>';
    $sancion->cerrarConexion();
}


?>