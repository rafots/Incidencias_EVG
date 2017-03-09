<?php
    session_start();
    require '../conexion/conexion.php';

    if($_POST["nombreTipo"]==""){
        header("Location: ../paginas/coordinador.php?campovacio=si");
    }
    else
    {
        $conexion = new conexion();
        $conectar = new mysqli($conexion->getServer(),$conexion->getUser(),$conexion->getPass(),$conexion->getDb());
        $consulta="SELECT idUsuario from profesores WHERE usuario='".$_SESSION["usuario"]."'";
        $resultado=$conectar->query($consulta);
        $fila=$resultado->fetch_array();

        $consulta_etapa="SELECT codEtapa FROM etapas where coordinador=".$fila["idUsuario"].";";
        $resultado_etapa=$conectar->query($consulta_etapa);
        $fila_etapa=$resultado_etapa->fetch_array();
        if($_POST["gestiona"]=="T" || $_POST["gestiona"]=="C")
        {
            $gestiona=$_POST["gestiona"];
        }
        $consulta_alta_tipo="INSERT INTO tipo_incidencias VALUES (?,?,?,?);";
        $stmt=$conectar->prepare($consulta_alta_tipo);
        $consulta_tipos="SELECT idTipo FROM tipo_incidencias";
        $resultado_tipos=$conectar->query($consulta_tipos);
        $cp=1;
        if($fila_tipos2=$resultado_tipos->fetch_array())
        {
            while($fila_tipos2=$resultado_tipos->fetch_array()){
                $cp++;
            }
            $cp++;
            $stmt->bind_param('isss',$cp,$_POST["nombreTipo"],$fila_etapa["codEtapa"],$gestiona);
        }
        else
        {
            $stmt->bind_param('isss',$cp,$_POST["nombreTipo"],$fila_etapa["codEtapa"],$gestiona);
        }
        echo $consulta_alta_tipo;
        $stmt->execute();
        header("Location: ../paginas/coordinador.php");
    }


?>