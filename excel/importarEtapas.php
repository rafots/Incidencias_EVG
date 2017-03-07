<!DOCTYPE html>
<?php
    require_once "../procedimientos/procedimientos.php";
    require_once "simplexlsx.class.php";

    $conexion = new procedimientos();
    $conexion->conectar();

    $xlsx = new SimpleXLSX("Etapas.xlsx");
    $tabla = $xlsx->rows();

    foreach($tabla as $indice){
        $sql = "INSERT INTO etapas VALUES(?,?,?)";
        $resultado = $conexion->consultasPreparadas($sql);
        $resultado->bind_param('sss', $codigo, $nombre, $coordinador);

        $codigo = $indice[0];
        $nombre = $indice[1];
        $coordinador = $indice[2];

        $resultado->execute();
        $resultado->close();
        echo $conexion->errores();

    }

    $conexion->cerrarConexion();
?>

