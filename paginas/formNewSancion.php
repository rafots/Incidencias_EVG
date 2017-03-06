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

    $sql_sanction_type = "SELECT * FROM tipo_sancion";

    $obj->consultas($sql_sanction_type);
    
    echo '
        
        <form class="form-horizontal" method="post" action="#">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">

                            <div class="form-group">
                                <label for="sanction-type" class="col-md-4 control-label">Tipo de sanción</label>
                                <div class="col-sm-8">
                                    <select id="sanction-type" name="sanction-type" class="form-control">
                                        <option selected="selected"> Elige un tipo de sanción </option>
                                    </select>
                                </div>
                            </div>';

    

    echo '                        <div class="form-group">
                                <label for="reason-type" class="col-md-4 control-label">Motivo</label>
                                <div class="col-sm-8">
                                    <select id="reason-type" name="reason-type" class="form-control">
                                        <option selected="selected"> Elige un motivo </option>
                                    </select>
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
    
}


?>