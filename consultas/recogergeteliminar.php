<?php
require_once '../procedimientos/procedimientos.php';
        $objeto = new procedimientos();
        $objeto->conectar();
        if(isset($_GET["numAnotacion"]))
            $_SESSION["anot"]=$_GET["numAnotacion"];
