<?php
    session_start();
    require '../procedimientos/procedimientos.php';
    /*OBTENER COORDINADOR*/
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


        $consulta_tipos="SELECT tipoAnotacion FROM tipos_anotaciones";
        $conexion->consultas($consulta_tipos);
        $cp=1;
        if($fila_tipos2=$conexion->devolverFilas())
        {
            while($fila_tipos2=$conexion->devolverFilas()){
                $cp++;
            }
            $cp++;
            $consulta_alta="INSERT INTO tipos_anotaciones VALUES (".$cp.",'".$_POST["nombreTipo"]."','".$fila_etapa["codEtapa"]."')";

        }
        else
        {
            $consulta_alta="INSERT INTO tipos_anotaciones VALUES (".$cp.",'".$_POST["nombreTipo"]."','".$fila_etapa["codEtapa"]."')";
        }
        $conexion->consultas($consulta_alta);
        header("Location: ../paginas/coordinador.php");
    }
?>