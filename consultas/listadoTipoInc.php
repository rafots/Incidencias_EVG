<?php
    $consulta="SELECT idUsuario from profesores WHERE usuario='".$_SESSION["usuario"]."'";
    $resultado=$conectar->query($consulta);
    $fila=$resultado->fetch_array();

    $consulta_etapa="SELECT codEtapa FROM etapas where coordinador=".$fila["idUsuario"].";";
    $resultado_etapa=$conectar->query($consulta_etapa);
    $fila_etapa=$resultado_etapa->fetch_array();

    $consulta_tabla="SELECT * FROM tipo_incidencias WHERE codEtapa='".$fila_etapa["codEtapa"]."'";
    $resultado_tabla=$conectar->query($consulta_tabla);

    if($fila_tabla=$resultado_tabla->fetch_array())
    {
        echo '<form>';
        echo '<table class="table table-striped">';
        echo '<thead>';
        echo '<th>Nombre</th>';
        echo '<th>¿Quien gestiona?</th>';
        echo '<th>Operacion</th>';
        echo '<thead>';
        echo '<tbody>';
        echo '<tr>';
        echo '<td>'.$fila_tabla["nombre"].'</td>';
        echo '<td>';
        if($fila_tabla["gestiona"]=="T")
        {
            echo 'Tutor';
        }
        else
        {
            echo 'Coordinador';
        }
        echo '</td>';
        echo '<td><a href="../paginas/alterTipoIncForm.php?codAntiguo='.$fila_tabla["idTipo"].'&nombreAntiguo='.$fila_tabla["nombre"].'&gestionaAnt='.$fila_tabla["gestiona"].'">Modificar</a></td>';

        echo '</tr>';
        while($fila_tabla=$resultado_tabla->fetch_array())
        {
            echo '<tr>';
            echo '<td>'.$fila_tabla["nombre"].'</td>';
            echo '<td>';
            if($fila_tabla["gestiona"]=="T")
            {
                echo 'Tutor';
            }
            else
            {
                echo 'Coordinador';
            }
            echo '</td>';
            echo '<td><a href="../paginas/alterTipoIncForm.php?codAntiguo='.$fila_tabla["idTipo"].'&nombreAntiguo='.$fila_tabla["nombre"].'&gestionaAnt='.$fila_tabla["gestiona"].'">Modificar</a></td>';
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
        echo '</form>';

    }
    else
    {
        echo '<p class="bg-danger">No existe ningun tipo de incidencia</p>';
    }


    if(isset($_GET["modificar"]))
    {
        echo '<p>Se ha modificado el tipo de incidencia con exito</p>';
    }

?>