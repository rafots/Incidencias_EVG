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
$update_tut = "UPDATE profesores SET tutor = TRUE WHERE idUsuario = ?";
if(!($stmt=$objeto->consultasPreparadas($consulta)))
    echo 'Preparacion de insert fallido';

if(!($stmt_tut=$objeto->consultasPreparadas($update_tut)))
    echo 'Preparacion de insert fallido';

$stmt->bind_param("ssis",$string1,$string2,$int1,$string3);
$stmt_tut->bind_param("i",$tut);

foreach ($tabla as $indice => $valor){
    $string1=$valor[0];
    $string2=$valor[1];
    $int1=$valor[2];
    $string3=$valor[3];
    $stmt->execute();

    $tut=$valor[2];
    $stmt_tut->execute();
}

    $stmt->close();
    $stmt_tut->close();

?>