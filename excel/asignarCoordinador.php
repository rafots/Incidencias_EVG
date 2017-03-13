<?php
require_once "simplexlsx.class.php";
require_once "../procedimientos/procedimientos.php";

$xlsx = new SimpleXLSX("Etapas.xlsx");
$tabla = $xlsx->rows();

$conexion = new procedimientos();
$conexion->conectar();

foreach($tabla as $indice){
    $selectProf = "UPDATE profesores SET coordinador=1 WHERE profesores.idUsuario = '".$indice[2]."'";
    $conexion->consultas($selectProf);
}

if($conexion->filasAfectadas()){
    echo "Se han importado los datos con exito";
}else{
    echo "Error al importar los datos";
}