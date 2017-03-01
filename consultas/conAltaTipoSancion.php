<?php
    session_start();
    require '../conexion/conexion.php';
    $conexion = new conexion();
    $conectar = new mysqli($conexion->getServer(),$conexion->getUser(),$conexion->getPass(),$conexion->getDb());
    $consulta_alta_tipo_sancion="INSERT INTO tipo_sancion VALUES (?,?)";
    $stmt=$conectar->prepare($consulta_alta_tipo_sancion);
    $consulta_tipo_sancion="SELECT tipoSancion FROM tipo_sancion";
    $resultado_tipos=$conectar->query($consulta_tipo_sancion);
    $cp=1;
    if($fila_tipos2=$resultado_tipos->fetch_array())
    {
        while($fila_tipos2=$resultado_tipos->fetch_array()){
            $cp++;
        }
        $cp++;
        $stmt->bind_param('is',$cp,$_POST["nombreTipo"]);
    }
    else
    {
        $stmt->bind_param('is',$cp,$_POST["nombreTipo"]);
    }
    $stmt->execute();
    header("Location:../paginas/addTipoSancion.php?consulta=ok");
?>