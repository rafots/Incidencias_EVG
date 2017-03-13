<?php
/**
 * Created by PhpStorm.
 * User: Jorge Luis
 * Date: 13/03/2017
 * Time: 21:59
 */

session_start();
if(!isset($_SESSION['usuario']))
    header('Location: iniciarSesion.html');
else{

    require '../procedimientos/procedimientos.php';
    $sancion = new procedimientos();
    $sancion->conectar();

    $sql = "UPDATE sanciones SET tipoSancion = ".$_POST['sanction-type'].", fecha_inicio = '".$_POST['initial-date']."', fecha_fin = '".$_POST["end-date"]."', observacion = '".$_POST["observations"]."', idMotivo = ".$_POST['reason-type']."
      WHERE idSancion = ".$_POST["id-sanction"];
    $sancion->consultas($sql);
    echo $sql;

    header('Location: ../paginas/coordinador.php');

}