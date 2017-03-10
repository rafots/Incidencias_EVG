<?php

echo'<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="../sources/ajaxGestor.js" type="text/javascript"></script>';

require_once '../procedimientos/procedimientos.php';


$objeto = new procedimientos();
$objeto->conectar();
$consulta="Select * from secciones";
$objeto->consultas($consulta);
echo ' <h4>Secciones</h4>';
        echo '<table class="table table-striped table-responsive text-center">';
        echo '<tr>
           <th>IdSeccion</th>
           <th >Nombre</th>  
           <th>Tutor</th>
           <th>Etapas</th>
           <th> </th>
           <th> </th>
              </tr>';
        while ($fila = $objeto->devolverfilas()) {
            echo '<tr>';
            echo '<th>'.$fila["idSeccion"].'</th>';
            echo '<th>'.$fila["nombre"].'</th>';
            echo '<th>'.$fila["tutor"].'</th>';
            echo '<th>'.$fila["codEtapa"].'</th>';
            echo '<th><a href="../consultas/eliminarsecgestor.php?val='.$fila["idSeccion"].' ">Eliminar</a>';
            echo '<th><a href="#">Modificar</a>';
            echo '<tr/>';
}

    echo'</table>
    <button  type="button" id="aniadirSeccion" class="btn btn-success">Añadir nueva Seccion</button>';
    echo '<div id="aniadirsec">

          </div>';
