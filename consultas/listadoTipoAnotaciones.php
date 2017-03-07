<?php
    session_start();
    $consulta="SELECT idUsuario from profesores WHERE usuario='".$_SESSION["usuario"]."'";
    $resultado=$conectar->query($consulta);
    $fila=$resultado->fetch_array();

    $consulta_etapa="SELECT codEtapa FROM etapas where coordinador=".$fila["idUsuario"].";";
    $resultado_etapa=$conectar->query($consulta_etapa);
    $fila_etapa=$resultado_etapa->fetch_array();

    $consulta_tabla="SELECT * FROM tipos_anotaciones WHERE codEtapa='".$fila_etapa["codEtapa"]."'";
    $resultado_tabla=$conectar->query($consulta_tabla);

    if($fila_tabla=$resultado_tabla->fetch_array())
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
            while($fila_tabla=$resultado_tabla->fetch_array())
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
        echo '<p>No hay tipos de anotaciones</p>';
    }

?>