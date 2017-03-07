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

    //$objeto->consultas($consulta2);
    $i=0;

    visualizar($objeto);
}

function visualizar($objeto){
    $query="DELETE from anotaciones where numAnotacion=".$_SESSION["anot"]."";
    $objeto->consultas($query);
    header('Location: misanotaciones.php');
}

function tutor(){
    require_once '../procedimientos/procedimientos.php';
    $bd = new conexion();
    $objeto = new procedimientos();
    $servidor = $bd->getServer();
    $usuario = $bd->getUser();
    $contrasenia = $bd->getPass();
    $baseDatos = $bd->getDb();
    $objeto->conectar();
    if(isset($_GET["numAnotacion"]))
        $_SESSION["anot"]=$_GET["numAnotacion"];

    $consulta="numAnotacion,tipoAnotacion,anotaciones.nia,leida,verProfesores,nombreCompleto from anotaciones inner JOIN alumnos on anotaciones.nia = alumnos.nia WHERE numAnotacion LIKE '".$_SESSION["anot"]."''";
    $objeto->consultas($consulta);
    $i=0;

    visualizar();
}

?>