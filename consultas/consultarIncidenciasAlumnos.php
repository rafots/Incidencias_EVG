<?php
/**
 * Created by PhpStorm.
 * User: Rafa
 * Date: 08/03/2017
 * Time: 23:57
 */
require '../procedimientos/procedimientos.php';
require_once '../consultas/requires.php';
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
        echo '<table class="table table-responsive text-center " id="alumm">';
        while($fila = $obj->devolverFilas())
        {
            echo '<tr>
                    <td>'.$fila['idIncidencia'].'</td>
                    <td>'.$fila['nombre'].'</td>
                    <td>'.$fila['codAsignatura'].'</td>
                    <td>'.$fila['nombreHora'].'</td>
                    <td>'.$fila['fecha_ocurrencia'].'</td>
                    <td><button type="button" class="btn btn-primary" id="easy">
                    <span class="glyphicon glyphicon-eye-open"></span></button></button></td></tr>';
        }
        echo '</table>';
        echo '</div>';
        echo '</div>';
        echo '
 
                ';

    }