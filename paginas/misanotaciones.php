<?php
session_start();
$opc;
if(isset($_SESSION['coordinador'])){
    $opc="c";
    coordinador($opc);
}else{
    if(isset($_SESSION['tutor'])){
        $opc="t";
        tutor($opc);
    }else{
        session_destroy();
        echo 'no tienes permiso para acceder a esta pagina';
    }
}

function coordinador($opc){
    require_once '../procedimientos/procedimientos.php';
    $bd = new conexion();
    $objeto = new procedimientos();
    $objeto->conectar();
    $consulta="Select numAnotacion,tipos_Anotaciones.nombre as tipoAnotaciones,anotaciones.nia as anotacion,leida,verProfesores,nombreCompleto from anotaciones inner join tipos_Anotaciones on anotaciones.tipoAnotacion=tipos_anotaciones.tipoAnotacion inner JOIN alumnos on anotaciones.nia = alumnos.nia WHERE userCreacion LIKE '".$opc."' AND leida=0";
    $objeto->consultas($consulta);
    $i=0;

    visualizar($objeto);
}

function tutor($opc){
    require_once '../procedimientos/procedimientos.php';
    $bd = new conexion();
    $objeto = new procedimientos();
    $objeto->conectar();
    $consulta="Select numAnotacion,tipos_Anotaciones.nombre as tipoAnotaciones,anotaciones.nia as anotacion,leida,verProfesores,nombreCompleto from anotaciones inner join tipos_Anotaciones on anotaciones.tipoAnotacion=tipos_anotaciones.tipoAnotacion inner JOIN alumnos on anotaciones.nia = alumnos.nia WHERE userCreacion LIKE '".$opc."' AND leida=0";
    $objeto->consultas($consulta);
    $i=0;

    visualizar($objeto);
}

function visualizar($objeto){

    echo '<h4>Mis Anotaciones</h4>';
    while($fila=$objeto->devolverFilas()){
        echo '<h7>Tipo de anotacion:'.$fila["numAnotacion"].'</h7>';
        echo '<br/>';
        echo '<h7>Descripcion de la anotacion:'.$fila["tipoAnotaciones"].'</h7>';
        echo '<br/>';
        echo '<h7>NIA del alumno implicado:'.$fila["anotacion"].'</h7>';
        echo '<br/>';
        echo '<h7>Nombre del Alumno:'.$fila["nombreCompleto"].'</h7>';
        echo '<br/>';
        echo '<a id="misanotacionesmostrar" href="misanotacionesmostrar.php?numAnotacion='.$fila["numAnotacion"].'">Ver la anotacion en detalle</a>';
        echo '<br/><br/>';
    }
}

?>