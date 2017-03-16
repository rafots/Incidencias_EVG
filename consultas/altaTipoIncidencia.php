<?php
    session_start();
    require '../procedimientos/procedimientos.php';

    if($_POST["nombreTipo"]==""){
        header("Location: ../paginas/coordinador.php?campovacio=si");
    }
    else
    {
        $conexion = new procedimientos();
        $conexion->conectar();
        $consulta="SELECT idUsuario from profesores WHERE usuario='".$_SESSION["usuario"]."'";
        $conexion->consultas($consulta);
        $fila=$conexion->devolverFilas();

        $consulta_etapa="SELECT codEtapa FROM etapas where coordinador=".$fila["idUsuario"].";";
        $conexion->consultas($consulta_etapa);
        $fila_etapa=$conexion->devolverFilas();
        if($_POST["gestiona"]=="T" || $_POST["gestiona"]=="C")
        {
            $gestiona=$_POST["gestiona"];
        }
        /*$consulta_alta_tipo="INSERT INTO tipo_incidencias VALUES (?,?,?,?);";
        $stmt=$conectar->prepare($consulta_alta_tipo);*/
        $consulta_tipos="SELECT idTipo FROM tipo_incidencias";
        $conexion->consultas($consulta_tipos);
        $cp=1;
        if($fila_tipos2=$conexion->devolverFilas())
        {
            while($fila_tipos2=$conexion->devolverFilas()){
                $cp++;
            }
            $cp++;
            $consulta_alta="INSERT INTO `tipo_incidencias` VALUES (".$cp.", '".$_POST["nombreTipo"]."', '".$fila_etapa["codEtapa"]."', '".$gestiona."');";
        }
        else
        {
            $consulta_alta="INSERT INTO `tipo_incidencias` VALUES (".$cp.", '".$_POST["nombreTipo"]."', '".$fila_etapa["codEtapa"]."', '".$gestiona."');";
        }
        $conexion->consultas($consulta_alta);
        header("Location: ../paginas/coordinador.php");
    }


?>