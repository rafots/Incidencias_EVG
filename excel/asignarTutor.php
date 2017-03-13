<?php
require_once "simplexlsx.class.php";
require_once "../procedimientos/procedimientos.php";

$xlsx = new SimpleXLSX("usuarios.xlsx");
$tabla = $xlsx->rows();

$conexion = new procedimientos();
$conexion->conectar();

foreach($tabla as $indice){
    if($indice !=NULL){
        $selectProf = "UPDATE profesores SET tutor=1 WHERE nombre like '".$indice[1]."' ";
        $conexion->consultas($selectProf);
        $consulta2="select idUsuario from profesores where nombre like '".$indice[1]."'";
        $conexion->consultas($consulta2);
        $fila=$conexion->devolverFilas();
        $consulta3= "UPDATE secciones set tutor='".$fila["idUsuario"]."' where idSeccion like  '".$indice[2]."'";
        $conexion->consultas($consulta3);

    }
    echo "</br>".$selectProf;
    echo "</br>".$consulta2;
    echo "</br>".$consulta3;
}

if($conexion->filasAfectadas()){
    echo "Se han importado los datos con exito";
}else{
    echo "Error al importar los datos";
}