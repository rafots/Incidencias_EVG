<?php
    require_once "validaranotaciones.php";

function coordinador(){
    require_once "../consultas/recogergeteliminar.php";
    visualizar($objeto);
}

function visualizar($objeto){

    $query="DELETE from anotaciones where numAnotacion=".$_GET["anot"]."";
    $objeto->consultas($query);
    header('Location: coordinador.php');
}

function tutor(){
    require_once "../consultas/recogergeteliminar.php";
    visualizar($objeto);
}

?>