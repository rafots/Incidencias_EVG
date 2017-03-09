<?php
/**
 * Created by PhpStorm.
 * User: Jorge Luis
 * Date: 03/03/2017
 * Time: 20:52
 */

    session_start();
    if(!isset($_SESSION['usuario']) && !$_SESSION['gestor']) 
        header('Location: iniciarSesion.html');
    else {


        /*
         * Proceso para generar un listado de los profesores
         */

        require '../procedimientos/procedimientos.php';

        $obj = new procedimientos();
        $obj->conectar();

        $sql = "SELECT * FROM profesores ORDER BY nombre DESC";

        $obj->consultas($sql);

        if ($obj->numFilas() > 0) {

            echo '<h2>PROFESORES</h2>';
            echo '<table class="table table-striped table-responsive">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Usuario</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                ';

            while ($row = $obj->devolverFilas()) {
                echo '<tr>';
                echo '<td>' . $row['idUsuario'] . '</td>';
                echo '<td>' . $row['nombre'] . '</td>';
                echo '<td><a class="btn btn-success" href="../paginas/formModProfesor.php?id='.$row["id"].'"><span class="glyphicon glyphicon-cog"></span>Modificar</a></td>';
                echo '</tr>';
            }
            echo '</tbody>';
            echo '</table>';

        } else {
            echo '<h1><small>Actualmente no existen ningun profesor en la base de datos</small></h1>';
        }
    }
?>