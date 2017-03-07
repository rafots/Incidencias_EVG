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
    $bd = new conexion();
    $objeto = new procedimientos();
    $objeto->conectar();
    if(isset($_GET["numAnotacion"]))
        $_SESSION["anot"]=$_GET["numAnotacion"];
    $consulta2="Update anotaciones SET leida=1 WHERE numAnotacion='".$_SESSION["anot"]."'";
    $objeto->consultas($consulta2);
    $consulta="Select numAnotacion,tipos_Anotaciones.nombre as tipoAnotaciones,anotaciones.nia as anotacion,leida,verProfesores,nombreCompleto from anotaciones inner join tipos_Anotaciones on anotaciones.tipoAnotacion=tipos_anotaciones.tipoAnotacion inner JOIN alumnos on anotaciones.nia = alumnos.nia WHERE numAnotacion LIKE '".$_SESSION["anot"]."'";
    $objeto->consultas($consulta);
    $i=0;

    visualizar($objeto);
}

function visualizar($objeto){

    while($fila=$objeto->devolverFilas()){
        /*$_SESSION["numAnotacion"]=$i;*/
        echo '<h4>Tipo de anotacion:'.$fila["numAnotacion"].'</h4>';
        echo '<br/>';
        echo '<h4>Descripcion de la anotacion:'.$fila["tipoAnotaciones"].'</h4>';
        echo '<br/>';
        echo '<h4>NIA del alumno implicado:'.$fila["anotacion"].'</h4>';
        echo '<br/>';
        echo '<h4>Nombre del Alumno:'.$fila["nombreCompleto"].'</h4>';
        echo '<br/>';
        echo '<a href="anotaciones.php" class="btn btn-success " role="button">Volver</a> ';

    }
}

function tutor(){
    require_once '../procedimientos/procedimientos.php';
    $bd = new conexion();
    $objeto = new procedimientos();
    $objeto->conectar();
    if(isset($_GET["numAnotacion"]))
        $_SESSION["anot"]=$_GET["numAnotacion"];
    $consulta2="Update anotaciones SET leida=1 WHERE numAnotacion='".$_SESSION["anot"]."'";
    $objeto->consultas($consulta2);
    $consulta="numAnotacion,tipoAnotacion,anotaciones.nia,leida,verProfesores,nombreCompleto from anotaciones inner JOIN alumnos on anotaciones.nia = alumnos.nia WHERE numAnotacion LIKE '".$_SESSION["anot"]."''";
    $objeto->consultas($consulta);
    $i=0;

    visualizar();
}

?>