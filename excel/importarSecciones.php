


<?php
require_once '../procedimientos/procedimientos.php';
require_once 'simplexlsx.class.php';

extract($_POST);
$xlsx = new SimpleXLSX("curso.xlsx");
$tabla = $xlsx->rows();

//Realizamos la conexion con la base de datos
$objeto = new procedimientos();
$objeto->conectar();

//Recorremos las filas del documento Excel y las asignamos a variables
$consulta="INSERT INTO secciones VALUES (?,?,?,?)";
$stmt = $objeto->consultasPreparadas($consulta);

$stmt->bind_param("ssis",$string1,$string2,$int1,$string3);
foreach ($tabla as $indice => $valor){
    $string1= $valor[0];
    $string2= $valor[1];
    $int1= $valor[2];
    $string3= $valor[3];
    $stmt->execute();
}

$stmt->close();

if($objeto->filasAfectadas()){
    echo "Se han importado los datos con exito";
}else{
    echo "Error al importar los datos";
}

?>