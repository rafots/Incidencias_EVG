<?php
require_once "simplexlsx.class.php";
require_once "../procedimientos/procedimientos.php";

$xlsx = new SimpleXLSX("usuarios.xlsx");
$tabla = $xlsx->rows();

$conexion = new procedimientos();
$conexion->conectar();

foreach($tabla as $indice){
    if($indice[3] != NULL){
        $updateProf = "UPDATE profesores SET coordinador=TRUE WHERE profesores.nombre = '".$indice[1]."' ";
        $conexion->consultas($updateProf);

        $idProf = "SELECT idUsuario FROM profesores WHERE nombre = '".$indice[1]."' ";
        $conexion->consultas($idProf);
        $fila = $conexion->devolverFilas();

        $updateSec = "UPDATE etapas SET coordinador=".$fila["idUsuario"]." WHERE codEtapa = '".$indice[3]."' ";
        $conexion->consultas($updateSec);
    }
}

if($conexion->filasAfectadas()){
    echo "Se han importado los datos con exito";
    header('Location: ../paginas/Importaciones.php');
}else{
    echo "Error al importar los datos";
}