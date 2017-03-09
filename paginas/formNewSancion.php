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

    require '../procedimientos/procedimientos.php';

    $obj = new procedimientos();
    $obj->conectar();
    
    echo '
        
        <form class="form-horizontal" method="post" action="../consultas/addSancion.php">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">

                            <div class="form-group">
                                <label for="sanction-type" class="col-md-4 control-label">Tipo de sanción</label>
                                <div class="col-sm-8">
                                    <select id="sanction-type" name="sanction-type" class="form-control">
                                        <option selected="selected" value=""> Elige un tipo de sanción </option>';

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
                                <label for="reason-type" class="col-md-4 control-label">Motivo</label>
                                <div class="col-sm-8">
                                    <select id="reason-type" name="reason-type" class="form-control">
                                        <option selected="selected"> Elige un motivo </option>';

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



    echo '                                </select>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6 col-sm-12">

                            <div class="form-group">
                                <label for="initial-date" class="col-md-4 control-label">Fecha de inicio</label>
                                <div class="col-sm-8">
                                    <input type="date" class="form-control" name="initial-date" id="initial-date" placeholder="Fecha de inicio"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="end-date" class="col-md-4 control-label">Fecha de fin</label>
                                <div class="col-sm-8">
                                    <input type="date" class="form-control" name="end-date" id="end-date" placeholder="Fecha de fin" rel="txtTooltip" title="Texto" data-toggle="tooltip" data-placement="top"/>
                                </div>
                            </div>

                        </div>
                    </div>

                    <textarea class="form-control" rows="5" name="observations" placeholder="Observaciones de la sanción"></textarea>
                    
                    <input type="submit" class="btn btn-success" name="new-sanction" value="Crear sanción" />

                </form>
        
    ';

    $obj->cerrarConexion();

}


?>