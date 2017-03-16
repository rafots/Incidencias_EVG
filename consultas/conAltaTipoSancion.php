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

        $consulta_tipo_sancion="SELECT tipoSancion FROM tipo_sancion";
        $conexion->consultas($consulta_tipo_sancion);
        $cp=1;
        if($fila_tipos2=$conexion->devolverFilas())
        {
            while($fila_tipos2=$conexion->devolverFilas()){
                $cp++;
            }
            $cp++;
            $consulta_alta_tipo_sancion="INSERT INTO tipo_sancion VALUES (".$cp.",'".$_POST["nombreTipo"]."')";
        }
        else
        {
            $consulta_alta_tipo_sancion="INSERT INTO tipo_sancion VALUES (".$cp.",'".$_POST["nombreTipo"]."')";
        }
        $conexion->consultas($consulta_alta_tipo_sancion);
        header("Location: ../paginas/coordinador.php");
    }

?>