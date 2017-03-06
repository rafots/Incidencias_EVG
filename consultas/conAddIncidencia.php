<?php
    session_start();
    /*INSERT INTO `incidencias` VALUES (NULL, '092323A', '2', '1', 'Recreo', '1', '2017-03-01', '2017-03-08 08:32:19', 'Yasuo', '0', '0', '0', '0');*/
    include "../conexion/conexion.php";
    $conexion = new conexion();
    $conectar = new mysqli($conexion->getServer(),$conexion->getUser(),$conexion->getPass(),$conexion->getDb());

    $consulta_user="SELECT idUsuario FROM profesores WHERE usuario='".$_SESSION["usuario"]."'";
    $resultado_user=$conectar->query($consulta_user);
    $fila_usuario=$resultado_user->fetch_array();

    $consulta_add_incidencia="INSERT INTO incidencias VALUES (DEFAULT, '".$_POST["nia"]."', ".$_POST["tipo_inc"].", ".$fila_usuario["idUsuario"].", '".$_POST["asignatura"]."', ".$_POST["hora"].", '".$_POST["fecha_incidencia"]."', NOW(), '".$_POST["descripcion"]."', '0', '0', '0', '0');";
    $resultado_add_incidencia=$conectar->query($consulta_add_incidencia);
    header("Location: ../paginas/addIncidencia.php?funciona=si");
?>