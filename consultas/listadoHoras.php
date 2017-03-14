<?php

$consulta_tabla="SELECT * FROM horas";
$conexion->consultas($consulta_tabla);

if($fila_tabla=$conexion->devolverFilas())
{
    echo '<table class="table table-striped">';
    echo '<thead>';
    echo '<th>Hora</th>';
    echo '<th>Operacion</th>';
    echo '<thead>';
    echo '<tbody>';
    echo '<tr>';
    echo '<td>'.$fila_tabla["nombre"].'</td>';
    echo '<td><a href="alterTipoAnotacionForm.php?modificar=si&codAntiguo='.$fila_tabla["idHora"].'&nombreAntiguo='.$fila_tabla["hora"].'">Modificar</a></td>';
    echo '</tr>';

    if(!empty($fila_tabla))
    {
        while($fila_tabla=$conexion->devolverFilas())
        {
            echo '<tr>';
            echo '<td>'.$fila_tabla["nombre"].'</td>';
            echo '<td><a href="alterTipoAnotacionForm.php?modificar=si&codAntiguo='.$fila_tabla["idHora"].'&nombreAntiguo='.$fila_tabla["hora"].'">Modificar</a></td>';
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