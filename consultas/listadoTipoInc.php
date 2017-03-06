<?php
    $consulta="SELECT idUsuario from profesores WHERE usuario='".$_SESSION["usuario"]."'";
    $resultado=$conectar->query($consulta);
    $fila=$resultado->fetch_array();

    $consulta_etapa="SELECT codEtapa FROM etapas where coordinador=".$fila["idUsuario"].";";
    $resultado_etapa=$conectar->query($consulta_etapa);
    $fila_etapa=$resultado_etapa->fetch_array();

    $consulta_tabla="SELECT * FROM tipo_incidencias";
    $resultado_tabla=$conectar->query($consulta_tabla);
    echo '<table>';
    if($fila_tabla=$resultado_tabla->fetch_array())
    {
        echo '<tr>';
        echo '<td>'.$fila_tabla["nombre"].'</td>';
        echo '<td><a href="alterTipoIncForm.php?modificar=si&codAntiguo='.$fila_tabla["idTipo"].'&nombreAntiguo='.$fila_tabla["nombre"].'">Modificar</a></td>';
        echo '</tr>';
        while($fila_tabla=$resultado_tabla->fetch_array())
        {
            echo '<tr>';
            echo '<td>'.$fila_tabla["nombre"].'</td>';
            echo '<td><a href="alterTipoIncForm.php?modificar=si&codAntiguo='.$fila_tabla["idTipo"].'&nombreAntiguo='.$fila_tabla["nombre"].'">Modificar</a></td>';
            echo '</tr>';
        }
    }

    if(isset($_GET["modificar"]))
    {
        echo '<p>Se ha modificado el tipo de incidencia con exito</p>';
    }
    echo '</table>';
?>