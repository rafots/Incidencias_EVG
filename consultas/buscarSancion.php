<?php
/**
 * Created by PhpStorm.
 * User: Jorge Luis
 * Date: 13/03/2017
 * Time: 18:47
 */

if(!isset($_SESSION['usuario']))
    header('Location: iniciarSesion.html');
else{

    require '../procedimientos/procedimientos.php';
    $sancion = new procedimientos();
    $sancion->conectar();

    $sql = "SELECT sanciones.*, alumnos.nombreCompleto AS nombreAlumno, tipo_sancion.nombre AS nombreSancion, motivo.motivo AS nombreMotivo FROM sanciones 
    INNER JOIN alumnos ON sanciones.nia = alumnos.nia
    INNER JOIN motivo ON motivo.idMotivo = sanciones.idMotivo
    INNER JOIN tipo_sancion ON tipo_sancion.tipoSancion = sanciones.tipoSancion
    WHERE idSancion = ".$_GET["idSancion"];
    $sancion->consultas($sql);

}