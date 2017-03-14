<?php
session_start();
require '../procedimientos/procedimientos.php';
/*OBTENER COORDINADOR*/
if($_POST["nombreHora"]==""){
    header("Location: ../paginas/gestorHoras.php");
}
else
{
    $conexion = new procedimientos();
    $conexion->conectar();

    $consulta_tipos="SELECT idHora FROM horas";
    $conexion->consultas($consulta_tipos);
    $cp=1;
    if($fila_tipos2=$conexion->devolverFilas())
    {
        while($fila_tipos2=$conexion->devolverFilas()){
            $cp++;
        }
        $cp++;
        $consulta_alta="INSERT INTO horas VALUES (".$cp.",".$_POST["nombreHora"].")";
    }
    else
    {
        $consulta_alta="INSERT INTO horas VALUES (".$cp.",".$_POST["nombreHora"].")";
    }
    $conexion->consultas($consulta_alta);
    header("Location: ../paginas/gestionHoras.php");
}
?>