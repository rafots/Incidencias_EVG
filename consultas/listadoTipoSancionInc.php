<?php
    $consulta="SELECT idUsuario from profesores WHERE usuario='".$_SESSION["usuario"]."'";
    $resultado=$conectar->query($consulta);
    $fila=$resultado->fetch_array();

    $consulta_etapa="SELECT codEtapa FROM etapas where coordinador=".$fila["idUsuario"].";";
    $resultado_etapa=$conectar->query($consulta_etapa);
    $fila_etapa=$resultado_etapa->fetch_array();

    $consulta="SELECT tipo_sancion_incidencias.tipoSancion, tipo_sancion.nombre AS SANCION, tipo_sancion_incidencias.idTipo, tipo_incidencias.nombre AS INCIDENCIA
                        FROM tipo_sancion_incidencias
                        INNER JOIN tipo_incidencias
                        ON tipo_incidencias.idTipo=tipo_sancion_incidencias.idTipo
                        INNER JOIN tipo_sancion
                        ON tipo_sancion.tipoSancion=tipo_sancion_incidencias.tipoSancion
                        WHERE tipo_incidencias.codEtapa='".$fila_etapa["codEtapa"]."'";

    $resultado=$conectar->query($consulta);
    echo '<table>';
    if($fila_tabla=$resultado->fetch_array())
    {
        if(empty($fila_tabla))
        {
            echo '<tr>';
            echo '<td colspan="2">No se encuentran tipos de sanciones</td>';
            echo '</tr>';
        }
        echo '<tr>';
        echo '<td>Tipo sancion</td>';
        echo '<td>Tipo incidencia</td>';
        echo '<td></td>';
        echo '</tr>';
        echo '<tr>';
        echo '<td>'.$fila_tabla["SANCION"].'</td>';
        echo '<td>'.$fila_tabla["INCIDENCIA"].'</td>';
        echo '<td><a href="alterTipoSancionIncForm.php?sancionAnt='.$fila_tabla["SANCION"].'&incAntiguo='.$fila_tabla["INCIDENCIA"].'">Modificar</a></td>';
        echo '</tr>';

        if(!empty($fila_tabla))
        {
            while($fila_tabla=$resultado->fetch_array())
            {
                echo '<tr>';
                echo '<td>'.$fila_tabla["SANCION"].'</td>';
                echo '<td>'.$fila_tabla["INCIDENCIA"].'</td>';
                echo '<td><a href="alterTipoSancionIncForm.php?sancionAnt='.$fila_tabla["SANCION"].'&incAntiguo='.$fila_tabla["INCIDENCIA"].'">Modificar</a></td>';
                echo '</tr>';
            }
        }
    }
    echo '</table>';
    if(isset($_GET["modificar"]))
    {
        echo '<p>Se ha modificado el tipo de sancion con exito</p>';
    }
?>