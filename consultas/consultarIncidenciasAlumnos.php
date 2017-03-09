<?php
/**
 * Created by PhpStorm.
 * User: Rafa
 * Date: 08/03/2017
 * Time: 23:57
 */
require '../procedimientos/procedimientos.php';
echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>';
echo '<script type="text/javascript" src="../sources/ajax.js"></script>';
echo '<script type="text/javascript" src="../sources/bootstrap.js"></script>';
$obj = new procedimientos();
$obj->conectar();

    if(isset($_REQUEST['nia']))
    {
        $query ='SELECT t1.*,t3.nombre AS nombre ,t4.nombre AS nombreHora 
                    FROM incidencias t1 
                        INNER JOIN alumnos t2 
                              ON t1.nia = t2.nia
	                    INNER JOIN tipo_incidencias t3 
	                          ON t1.idTipo = t3.idTipo 
	                    INNER JOIN horas t4 
	                          ON t1.idHora = t4.idHora WHERE t2.nia = "'.$_REQUEST['nia'].'"';
        $obj->consultas($query);
        echo '<table class="table table-responsive text-center">';
        while($fila = $obj->devolverFilas())
        {
            echo '<tr><td>'.$fila['nombre'].'</td><td>'.$fila['codAsignatura'].'</td><td>'.$fila['nombreHora'].'</td><td>'.$fila['fecha_ocurrencia'].'</td><td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
  Launch demo modal
</button></td></tr>';
        }
        echo '</table>';
        echo '</div>';
        echo '</div>';
        echo '
        <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
        ';

    }