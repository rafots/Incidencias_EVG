<?php
require_once "simplexlsx.class.php";
require_once "../procedimientos/procedimientos.php";

$xlsx = new SimpleXLSX("usuarios.xlsx");
$tabla = $xlsx->rows();

$conexion = new procedimientos();
$conexion->conectar();

foreach($tabla as $indice){
    $selectProf = "UPDATE profesores SET tutor=1 WHERE profesores.nombre = '".$indice[1]."' AND '".$indice[2]."' <> NULL";
    echo $selectProf;
    $conexion->consultas($selectProf);

}

if($conexion->filasAfectadas()){
    echo "Se han importado los datos con exito";
}else{
    echo "Error al importar los datos";
}