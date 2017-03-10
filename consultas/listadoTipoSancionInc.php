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

    if($fila_tabla=$resultado->fetch_array())
    {

        echo '<table class="table table-striped">';
        echo '<thead>';
        echo '<tr>';
        echo '<th>Tipo sancion</th>';
        echo '<th>Tipo incidencia</th>';
        echo '<th>Operaciones</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
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
        echo '</tbody>';
        echo '</table>';
    }
    else
    {
        echo '<p class="bg-danger">No hay tipos de sanciones disponibles</p>';
    }
    if(isset($_GET["modificar"]))
    {
        echo '<p>Se ha modificado el tipo de sancion con exito</p>';
    }
?>