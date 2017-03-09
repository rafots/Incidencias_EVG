<?php
    $consulta="SELECT idUsuario from profesores WHERE usuario='".$_SESSION["usuario"]."'";
    $conexion->consultas($consulta);
    $fila=$conexion->devolverFilas();

    $consulta_etapa="SELECT codEtapa FROM etapas where coordinador=".$fila["idUsuario"].";";
    $conexion->consultas($consulta_etapa);
    $fila_etapa=$conexion->devolverFilas();

    $consulta_tabla="SELECT * FROM tipos_anotaciones WHERE codEtapa='".$fila_etapa["codEtapa"]."'";
    $conexion->consultas($consulta_tabla);

    if($fila_tabla=$conexion->devolverFilas())
    {
        echo '<table class="table table-striped">';
        echo '<thead>';
        echo '<th>Nombre</th>';
        echo '<th>Operacion</th>';
        echo '<thead>';
        echo '<tbody>';
        echo '<tr>';
        echo '<td>'.$fila_tabla["nombre"].'</td>';
        echo '<td><a href="alterTipoAnotacionForm.php?modificar=si&codAntiguo='.$fila_tabla["tipoAnotacion"].'&nombreAntiguo='.$fila_tabla["nombre"].'">Modificar</a></td>';
        echo '</tr>';

        if(!empty($fila_tabla))
        {
            while($fila_tabla=$conexion->devolverFilas())
            {
                echo '<tr>';
                echo '<td>'.$fila_tabla["nombre"].'</td>';
                echo '<td><a href="alterTipoAnotacionForm.php?modificar=si&codAntiguo='.$fila_tabla["tipoAnotacion"].'&nombreAntiguo='.$fila_tabla["nombre"].'">Modificar</a></td>';
                echo '</tr>';
            }
        }
        echo '</tbody>';
        echo '</table>';
    }
    else
    {
        echo '<p class="bg-danger">No hay tipos de anotaciones</p>';
    }

?>