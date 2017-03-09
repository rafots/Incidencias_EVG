<?php
session_start();
if(isset($_SESSION['coordinador'])){
    coordinador();
}else{
    if(isset($_SESSION['tutor'])){
        tutor();
    }else{
        session_destroy();
        echo 'no tienes permiso para acceder a esta pagina';
    }
}

function coordinador(){
    require_once '../procedimientos/procedimientos.php';
    $objeto = new procedimientos();
    $objeto->conectar();
    if(isset($_GET["numAnotacion"]))
        $_SESSION["anot"]=$_GET["numAnotacion"];
    $consulta="Select numAnotacion,tipos_Anotaciones.nombre as tipoAnotaciones,anotaciones.nia as anotacion,leida,verProfesores,nombreCompleto from anotaciones inner join tipos_Anotaciones on anotaciones.tipoAnotacion=tipos_anotaciones.tipoAnotacion inner JOIN alumnos on anotaciones.nia = alumnos.nia WHERE numAnotacion LIKE '".$_SESSION["anot"]."'";
    $objeto->consultas($consulta);
    //$objeto->consultas($consulta2);


    visualizar($objeto);
}

function visualizar($objeto){
    while($fila=$objeto->devolverFilas()){

        echo '<h4>Tipo de anotacion:'.$fila["numAnotacion"].'</h4>';
        echo '<br/>';
        echo '<h4>Descripcion de la anotacion:'.$fila["tipoAnotaciones"].'</h4>';
        echo '<br/>';
        echo '<h4>Nombre del Alumno:'.$fila["nombreCompleto"].'</h4>';
        echo '<br/>';
        echo '<a id="eliminaranotaciones" href="eliminaranotaciones.php?numAnotacion='.$fila["numAnotacion"].'" class="btn btn-success" role="button">Eliminar</a> ';
        echo '<a id="modificaranotaciones" href="modificaranotaciones.php?numAnotacion='.$fila["numAnotacion"].'" class="btn btn-success" role="button">Modificar</a> ';
        echo '<a id="misanotaciones" href="misanotaciones.php" class="btn btn-success " role="button">Volver</a> ';

    }
}

function tutor(){
    require_once '../procedimientos/procedimientos.php';
    $objeto = new procedimientos();
    $objeto->conectar();
    if(isset($_GET["numAnotacion"]))
        $_SESSION["anot"]=$_GET["numAnotacion"];

    $consulta="numAnotacion,tipoAnotacion,anotaciones.nia,leida,verProfesores,nombreCompleto from anotaciones inner JOIN alumnos on anotaciones.nia = alumnos.nia WHERE numAnotacion LIKE '".$_SESSION["anot"]."''";
    $objeto->consultas($consulta);
    $i=0;

    visualizar();
}

?>