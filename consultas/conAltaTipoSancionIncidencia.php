<?php
    require '../conexion/conexion.php';
    $conexion = new conexion();
    $conectar = new mysqli($conexion->getServer(),$conexion->getUser(),$conexion->getPass(),$conexion->getDb());
    $alta_tipo_sanc_inc="INSERT INTO tipo_sancion_incidencias VALUES (?,?)";
    $stmt=$conectar->prepare($alta_tipo_sanc_inc);

    $stmt->bind_param('ii',$_POST["tipoSancion"],$_POST["tipoIncidencia"]);

    $stmt->execute();
    header("Location:../paginas/coordinador.php");

?>
