<?php
require_once 'simplexlsx.class.php';
require_once '../procedimientos/procedimientos.php';

$xlsx = new SimpleXLSX("usu_secc.xlsx"); // Con esto directamente le pasamos el archivo que queremos abrir
$tabla = $xlsx->rows();  // Nos da todas las filas del Excel

$obj = new procedimientos();
$obj->conectar();
/*
*
* El documento excel constará de 2 columnas
* La primera columna contendrá el nombre del profesor y la segunda el identificativo de la sección
*
*/
foreach($tabla as $indice){
    $extractUser = "SELECT * FROM profesores WHERE nombre = '".$indice[1]."'";
    $sql = "INSERT INTO profesores_seccion VALUES (?, ?)";

    // extraigo el codigo del profesor
    $obj->consultas($extractUser);
    $row = $obj->devolverFilas();

    $stmt = $obj->consultasPreparadas($sql);
    $stmt->bind_param("si", $section, $user);

    $section = $indice[0];
    $user = $row['idUsuario'];

    $stmt->execute();
    $stmt->close();
}

if($obj->filasAfectadas()){
    echo "Se han importado los datos con exito";
    header('Location: ../paginas/Importaciones.php');
}else{
    echo "Error al importar los datos";
}

$obj->cerrarConexion();
?>