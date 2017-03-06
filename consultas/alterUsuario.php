<?php
/**
 * Created by PhpStorm.
 * User: Jorge Luis
 * Date: 05/03/2017
 * Time: 16:38
 */
    
    /*
     * Proceso para modificar usuarios
     */

    session_start();
    if(!isset($_SESSION['usuario']) && !$_SESSION['gestor' ]&& !$_GET['id'])
        header('Location: iniciarSesion.php');
    else{

        require '../procedimientos/procedimientos.php';

        $obj = new procedimientos();
        $obj->conectar();

        function boolean($value){
            if(isset($value))
                return true;
            else
                return false;
        }

        $sql = "UPDATE profesores SET usuario='".$_POST['user']."', correo='".$_POST['email']."', nombre='".$_POST['name']."', 
        gestor=".boolean($_POST['gestor']).", baja_temporal=".boolean($_POST['baja_temporal']);

        $obj->consultas($sql);
        
    }

?>