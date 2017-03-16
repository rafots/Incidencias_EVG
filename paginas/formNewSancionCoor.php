<?php
/**
 * Created by PhpStorm.
 * User: Jorge Luis
 * Date: 06/03/2017
 * Time: 22:55
 */

session_start();
if(!isset($_SESSION['usuario']))
    header('Location: iniciarSesion.php');
else{

    echo '<script type="text/javascript" src="../sources/comun.js"></script>';
    echo '<script type="text/javascript" src="../sources/ajaxCoordinador.js"></script>';

    require '../procedimientos/procedimientos.php';

    $obj = new procedimientos();
    $obj->conectar();

    echo '
    
        <form class="form-horizontal" name="formAddSancion" id="formAddSancion" method="post" action="../consultas/addSancion.php">

                    <div class="form-group">
                        <label for="section" class="col-md-3 control-label">Seccion</label>
                        <div class="col-sm-8">
                            <select id="extractSection" name="section" class="form-control">
                                <option value="">Elige una etapa</option>
    
    ';
    
    
    $searchSection = "SELECT * FROM secciones WHERE codEtapa = '".$_SESSION['codEtapa']."'";

    $obj->consultas($searchSection);

    if($obj->numFilas() > 0){

        while($row = $obj->devolverFilas()){

            echo '<option value="'.$row["idSeccion"].'"> '.$row["idSeccion"].' </option>';

        }

    }

    echo '                
                            
                            
                            </select>
                            
                        </div>
                        
                        <div id="extractAlumnosSecc"></div>
                        
                    </div>
                    <div class="form-group">
                        <label for="sanction-type" class="col-md-3 control-label">Tipo de sanción</label>
                        <div class="col-sm-8">
                            <select id="sanction-type" name="sanction-type" class="form-control">';

    /*
     * Extraigo los datos de tipo sancion y lo cargo en un select
     */
    $sql_sanction_type = "SELECT * FROM tipo_sancion";

    $obj->consultas($sql_sanction_type);

    if($obj->numFilas() > 0){

        while($row = $obj->devolverFilas()){

            echo '<option value="'.$row["tipoSancion"].'"> '.$row["nombre"].' </option>';

        }

    }

    echo'
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="reason-type" class="col-md-3 control-label">Motivo</label>
                                <div class="col-sm-8">
                                    <select id="reason-type" name="reason-type" class="form-control">';

    /*
     * Extraigo los datos de motivo y lo cargo en un select
     */
    $sql_reason = "SELECT * FROM motivo";

    $obj->consultas($sql_reason);

    if($obj->numFilas() > 0){

        while($row = $obj->devolverFilas()){

            echo '<option value="'.$row["idMotivo"].'"> '.$row["motivo"].' </option>';

        }

    }
    $obj->cerrarConexion();


    echo '            </select>
            </div>
        </div>';
}


?>

<div class="form-group">
    <label for="initial-date" class="col-md-3 control-label">Fecha de inicio</label>
    <div class="col-sm-8">
        <input type="date" class="form-control" name="initial-date" id="initial-date" required/>
    </div>
</div>

<div class="form-group">
    <label for="end-date" class="col-md-3 control-label">Fecha de fin</label>
    <div class="col-sm-8">
        <input type="date" class="form-control" name="end-date" id="end-date" required/>
    </div>
</div>

<div class="form-group">
    <label for="end-date" class="col-md-3 control-label">Observaciones</label>
    <div class="col-sm-8">
        <textarea class="form-control" rows="5" name="observations" id="observations" placeholder="Observaciones de la sanción" required></textarea>
    </div>
</div>

<div class="form-group">
    <div class="col-sm-offset-3 col-sm-8">
        <input type="submit" id="new-sanction-coor" class="btn btn-success" name="new-sanction" value="Crear sanción" />
    </div>
</div>

</form>
