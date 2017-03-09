<?php
session_start();
require_once "../consultas/buscarProfesor.php";
require_once "../consultas/buscarEtapa.php";

$fila = $conexion->devolverFilas();

if(!isset($_SESSION["gestor"])){
    echo "Acceso prohibido";
}else{
    echo '
    <form class="form-horizontal" action="../consultas/alterEtapa.php" method="POST">
        <div class="form-group">
            <label for="codEtapa">Codigo Etapa: </label>
            <input type="text" name="codEtapa" id="codEtapa" placeholder="'.$fila["codEtapa"].'">
        </div>
        <div class="form-group">
            <label for="nombre">Nombre: </label>
            <input type="text" name="nombre" id="nombre" placeholder="'.$fila["nombre"].'">
        </div>
        <div class="form-group">
            <label for="coordinador">Coordinador: </label>
            <select name="coordinador" id="coordinador" class="form-control" value="'.$fila["coordinador"].'">';
            while($fila = $conexion2->devolverFilas()){
                echo "<option>";echo $fila["nombre"]; echo "</option>";
            }echo '
            </select>
        </div>
        <div class="form-group">
            <input type="submit" name="boton" id="boton" value="Añadir" class="btn btn-success">
        </div>
    </form>';
}