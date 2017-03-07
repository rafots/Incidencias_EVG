<?php
    $consulta="SELECT idUsuario from profesores WHERE usuario='".$_SESSION["usuario"]."'";
    $resultado=$conectar->query($consulta);
    $fila=$resultado->fetch_array();

    $consulta_etapa="SELECT codEtapa FROM etapas where coordinador=".$fila["idUsuario"].";";
    $resultado_etapa=$conectar->query($consulta_etapa);
    $fila_etapa=$resultado_etapa->fetch_array();

    $consulta_tabla="SELECT * FROM tipo_incidencias";
    $resultado_tabla=$conectar->query($consulta_tabla);

    if($fila_tabla=$resultado_tabla->fetch_array())
    {
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
        echo '<td>/*<a id="#alterTipoInc" href="alterTipoIncForm.php?modificar=si&codAntiguo='.$fila_tabla["idTipo"].'&nombreAntiguo='.$fila_tabla["nombre"].'"></a>*/
        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Small Modal</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          ';
            echo '<form>';
            echo '<input type="text" name="antiguo" value="'.$fila_tabla["idTipo"].'" id="ocultar">';
            echo '<input type="text" name="antiguo" value="'.$fila_tabla["nombre"].'" id="ocultar">';
            echo '</form>';
        echo'
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div></td>';
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
            echo '<td><a id="#alterTipoInc" href="alterTipoIncForm.php?modificar=si&codAntiguo='.$fila_tabla["idTipo"].'&nombreAntiguo='.$fila_tabla["nombre"].'">Modificar</a></td>';
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';

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