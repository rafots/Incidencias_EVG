<?php
require_once 'procedimientos.php';
require_once 'simplexlsx.class.php';
extract($_POST);
$xlsx = new SimpleXLSX("curso.xlsx");
$tabla = $xlsx->rows();

//Realizamos la conexion con la base de datos
$bd = new conexion();
$objeto = new procedimientos();
$servidor = $bd->getServer();
$usuario = $bd->getUser();
$contrasenia = $bd->getPass();
$baseDatos = $bd->getDb();
$objeto->conectar();
//Recorremos las filas del documento Excel y las asignamos a variables
$consulta="INSERT INTO secciones VALUES (?,?,?,?)";
if(!($stmt=$objeto->consultasPreparadas($consulta)))
    echo 'La concha';
$stmt->bind_param("ssis",$string1,$string2,$int1,$string3);
foreach ($tabla as $indice => $valor){
    $string1=$valor[0];
    $string2=$valor[1];
    $int1=$valor[2];
    $string3=$valor[3];
    $stmt->execute();
    }

    $stmt->close();
    if($objeto->filasAfectadas()>0){
        echo "Datos insertados con exito";
    }else{
        echo "Error al insertar los datos";
    }



?>