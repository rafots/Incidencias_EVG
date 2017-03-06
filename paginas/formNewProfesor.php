<?php
/**
 * Created by PhpStorm.
 * User: Jorge Luis
 * Date: 06/03/2017
 * Time: 20:41
 */

session_start();
if(!isset($_SESSION['usuario']) && !$_SESSION['gestor' ])
    header('Location: iniciarSesion.php');
else{
    
  echo '
  
  <form class="form-horizontal" method="post" action="newUsuario.php">
    <div class="form-group">
        <label for="user" class="col-md-4 col-sm-4 control-label">Usuario</label>
        <div class="col-md-7 col-sm-8">
            <input type="text" class="form-control" name="user" id="user"/>
        </div>
    </div>
    <div class="form-group">
        <label for="email" class="col-md-4 col-sm-4 control-label">Correo Electrónico</label>
        <div class="col-md-7 col-sm-8">
            <input type="text" class="form-control" name="email" id="email"/>
        </div>
    </div>
    <div class="form-group">
        <label for="name" class="col-md-4 col-sm-4 control-label">Nombre completo</label>
        <div class="col-md-7 col-sm-8">
            <input type="text" class="form-control" name="name" id="name"/>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-4 col-sm-10">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="gestor"/> Gestor
                </label>
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
    
}

?>
