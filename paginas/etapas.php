<?php
session_start();
require_once "../procedimientos/procedimientos.php";

echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="../sources/ajaxGestor.js" type="text/javascript"></script>';

$conexion = new procedimientos();
$conexion->conectar();

$sql = "SELECT *, etapas.nombre AS nombreE, profesores.nombre AS nombrePROF FROM etapas INNER JOIN profesores ON etapas.coordinador = profesores.idUsuario";
$conexion->consultas($sql);

echo '
    <table class="table table-striped table-responsive text-center">
        <tr>
            <td>Codigo Etapa</td>
            <td>Nombre</td>
            <td>Coordinador</td>
        </tr>
        <tr>';
            while($fila = $conexion->devolverFilas()){echo '
                <td class="text-center">' . $fila["codEtapa"] . '</td>
                <td class="text-center">' . $fila["nombreE"] . '</td>
                <td class="text-center">' . $fila["nombrePROF"] . '</td>
                <td><button type="button" class="btn btn-success" name="modificar" value="'.$fila["codEtapa"].'" id="modificar">Modificar</button></td>
                <td><button type="button" class="btn btn-success" name="borrar" value="'.$fila["codEtapa"].'" id="borrar">Borrar</button></td>
        </tr>';
            } echo'
    </table>
    
    <button type="button" class="btn btn-success" name="aniadir" id="aniadirEtapa">Añadir nueva</button>
    <br/><br/>
    <div id="aniadir">
    
    </div>
';
