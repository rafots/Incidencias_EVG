<?php
    require_once "validaranotaciones.php";

function coordinador(){
    require_once "../consultas/recogergeteliminar.php";
    $objeto=new recogergeteliminar();
    visualizar($objeto->llamar());
}

function visualizar($objeto){

    $query="DELETE from anotaciones where numAnotacion=".$_SESSION["anot"]."";
    $objeto->consultas($query);
    header('Location: misanotaciones.php');
}

function tutor(){
    require_once "../consultas/recogergeteliminar.php";
    $objeto=new recogergeteliminar();
    visualizar($objeto->llamar());
}

?>