<?php

require 'validaranotaciones.php';

function coordinador(){
    require_once '../procedimientos/procedimientos.php';
    $objeto = new procedimientos();
    $objeto->conectar();

    visualizar($objeto);
}

function tutor(){
    require_once '../procedimientos/procedimientos.php';
    $objeto = new procedimientos();
    $objeto->conectar();

    visualizar($objeto);
}

function visualizar($objeto){


            echo'<h4>Modificar</h4>';
            echo '<form action="modificaranotaciones.php" method="post">';
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
            header('location:coordinador');
        }
}

?>