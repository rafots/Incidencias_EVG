<?php
    $consulta="SELECT idUsuario from profesores WHERE usuario='".$_SESSION["usuario"]."'";
    $resultado=$conectar->query($consulta);
    $fila=$resultado->fetch_array();

    $consulta_etapa="SELECT codEtapa FROM etapas where coordinador=".$fila["idUsuario"].";";
    $resultado_etapa=$conectar->query($consulta_etapa);
    $fila_etapa=$resultado_etapa->fetch_array();

    $consulta_tabla="SELECT * FROM tipo_sancion";
    $resultado_tabla=$conectar->query($consulta_tabla);
    echo '<table>';
    if($fila_tabla=$resultado_tabla->fetch_array())
    {
        echo '<tr>';
        echo '<td>'.$fila_tabla["nombre"].'</td>';
        echo '<td><a href="alterTipoSancionForm.php?modificar=si&codAntiguo='.$fila_tabla["tipoSancion"].'&nombreAntiguo='.$fila_tabla["nombre"].'">Modificar</a></td>';
        echo '</tr>';

        if(!empty($fila_tabla))
        {
            while($fila_tabla=$resultado_tabla->fetch_array())
            {
                echo '<tr>';
                echo '<td>'.$fila_tabla["nombre"].'</td>';
                echo '<td><a href="alterTipoSancionForm.php.php?modificar=si&codAntiguo='.$fila_tabla["tipoSancion"].'&nombreAntiguo='.$fila_tabla["nombre"].'">Modificar</a></td>';
                echo '</tr>';
            }
        }
    }
    else
    {
        echo '<tr>';
        echo '<td colspan="2">No hay tipos de sanciones disponibles</td>';
        echo '</tr>';
    }
    echo '</table>';
    if(isset($_GET["modificar"]))
    {
        echo '<p>Se ha modificado el tipo de sancion con exito</p>';
    }
?>