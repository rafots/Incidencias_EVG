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
    $i=0;

    visualizar($objeto,$opc);
}

function tutor($opc){
    require_once '../procedimientos/procedimientos.php';
    $bd = new conexion();
    $objeto = new procedimientos();
    $objeto->conectar();
    $i=0;

    visualizar($objeto,$opc);
}

function visualizar($objeto,$opc){


            echo'<h4>Modificar</h4>';
            echo'<form action="modificaranotaciones.php" method="post">';
            echo'<label>Tipo al que pertenece</label>';
            $consulta="Select * from tipos_anotaciones";
            $objeto->consultas($consulta);
            echo'<select name="tipo">';
            while($fila=$objeto->devolverfilas()){
                echo'<option value="'.$fila["tipoAnotacion"].'">'.$fila["nombre"].'</option>';
            }
            echo'</select>
            <label>Profesores</label>
            <select name = "opcion">
            <option value = 0>No</option>
            <option value = 1>Si</option>
            </select>
            <br/><br/>
            <input type="submit" value="Modificar" name="modificar" class="btn btn-success "> 
            <a href="misanotaciones.php" class="btn btn-success " role="button">Volver</a>
            </form>';

        if(isset($_POST["modificar"])){
            $query="Update anotaciones SET tipoAnotacion=".$_POST["tipo"].",verProfesores=".$_POST["opcion"]." where numAnotacion='".$_SESSION["anot"]."' ";
            $objeto->consultas($query);
            echo $query;
            echo'<script type="text/javascript"> alert("Modificado correctamente");</script>';
        }
}

?>