<?php
/**
 * Created by PhpStorm.
 * User: Jorge Luis
 * Date: 13/03/2017
 * Time: 21:30
 */

session_start();
if(!isset($_SESSION['usuario']))
    header('Location: iniciarSesion.html');
else{

    require '../procedimientos/procedimientos.php';
    $sancion = new procedimientos();
    $sancion->conectar();

    $sql = "DELETE FROM sanciones WHERE idSancion =".$_GET["idSancion"];
    $sancion->consultas($sql);

    header('Location: ../paginas/coordinador.php');
    
}