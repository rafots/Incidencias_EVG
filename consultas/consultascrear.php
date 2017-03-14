<?php
session_start();
require_once "../procedimientos/procedimientos.php";
$obj = new procedimientos();
$obj->conectar();
if(isset($_GET["nia"]) && (isset($_GET["tipo"] )))
    {
        $consultacrearanot = "Insert into anotaciones VALUES ('DEFAULT','" . $_GET["tipo"] . "','" . $_GET["nia"] . "','" .date("Y-m-d H"). "','" . $_SESSION["activa"] . "', " . 0 . ",NULL)";
        $obj->consultas($consultacrearanot);
        if($obj->filasAfectadas() > 0)
        {
            echo '<div class="alert alert-success" role="alert" id="alerta">Se ha creado la anotacion con exito</div>';
        }
        else
        {
            echo '<div class="alert alert-danger" role="alert" id="alerta">Error al crear anotacion</div>';
        }
    }
    else
    {
        echo '<div class="alert alert-danger" role="alert" id="alerta">Error al crear anotacion</div>';
    }




?>