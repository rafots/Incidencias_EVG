<?php
/**
 * Created by PhpStorm.
 * User: Jorge Luis
 * Date: 02/03/2017
 * Time: 19:01
 */

    require 'simplexlsx.class.php';
    require '../procedimientos/procedimientos.php';

    $xlsx = new SimpleXLSX("usu_secc.xlsx"); // Con esto directamente le pasamos el archivo que queremos abrir
    $tabla = $xlsx->rows();  // Nos da todas las filas del Excel

    $obj = new procedimientos();
    $obj->conectar();


    /*
     *
     * El documento excel constará de 2 columnas
     * La primera columna contendrá el nombre del profesor y la segunda el identificativo de la sección
     *
     */
    foreach($tabla as $indice){

        $extractUser = "SELECT * FROM profesores WHERE nombre = '".$indice[0]."'";
        $sql = "INSERT INTO profesores_seccion VALUES (?, ?)";

        // extraigo el codigo del profesor
        $obj->consultas($extractUser);
        $row = $obj->devolverFilas();

        $stmt = $obj->consultasPreparadas($sql);
        $stmt->bind_param("is", $user, $section);

        $user = $row['idUsuario'];
        $section = $indice[1];

        $stmt->execute();
        $stmt->close();

    }
    $obj->cerrarConexion();

?>