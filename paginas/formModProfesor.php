<?php
/**
 * Created by PhpStorm.
 * User: Jorge Luis
 * Date: 05/03/2017
 * Time: 17:51
 */
    
    /*
     * Se genera el formulario para la modificación de los usuarios
     */
    
    session_start();
    if(!isset($_SESSION['usuario']) && !$_SESSION['gestor' ]&& !$_GET['id'])
        header('Location: iniciarSesion.php');
    else{

        require '../procedimientos/procedimientos.php';

        $sql = "SELECT * FROM profesores WHERE idUsuario = '".$_GET['id']."'";

        $obj = new procedimientos();
        $obj->consultas($sql);

        if($this->conexion->num_rows > 0){

            $row = $obj->devolverFilas();

            echo '<form class="form-horizontal" method="post" action="alterUsuario.php">
                        <div class="form-group">
                            <label for="user" class="col-md-4 col-sm-4 control-label">Id del Usuario</label>
                            <div class="col-md-7 col-sm-8">
                                <input type="text" class="form-control" name="user" value="'.$row["idUsuario"].'" maxlength="3" id="user" disabled/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="user" class="col-md-4 col-sm-4 control-label">Usuario</label>
                            <div class="col-md-7 col-sm-8">
                                <input type="text" class="form-control" name="user" value="'.$row["usuario"].'" maxlength="20" id="user"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-md-4 col-sm-4 control-label">Correo Electrónico</label>
                            <div class="col-md-7 col-sm-8">
                                <input type="text" class="form-control" name="email" value="'.$row["correo"].'" maxlength="60" id="email"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-4 col-sm-4 control-label">Nombre completo</label>
                            <div class="col-md-7 col-sm-8">
                                <input type="text" class="form-control" name="name" value="'.$row["nombre"].'" maxlength="50" id="name"/>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-10">
                                <div class="checkbox">
                                    <label>';
                                        if($row["gestor"])
                                            echo '<input type="checkbox" name="gestor" checked/> Gestor';
                                        else
                                            echo '<input type="checkbox" name="gestor"/> Gestor';
                        echo'            </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-10">
                                <div class="checkbox">
                                    <label>';
                                        if($row["gestor"])
                                            echo '<input type="checkbox" name="b_temp" checked/> Baja temporal';
                                        else
                                            echo '<input type="checkbox" name="b_temp"/> Baja temporal';
                        echo            '</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-10">
                                <input type="submit" class="btn btn-success" name="mod_user" id="mod_user"/>
                            </div>
                        </div>
                        
                    </form>
                ';

        }else{
            echo '<h2><small>Error: No hay datos</small></h2>';
        }
        

    }
?>