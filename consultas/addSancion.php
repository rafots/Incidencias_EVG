<?php
/**
 * Created by PhpStorm.
 * User: 2daw01
 * Date: 03/03/2017
 * Time: 10:55
 */

    require '../procedimientos/procedimientos.php';

    $obj = new procedimientos();
    $obj->conectar();

    /*
     * Controlo el valor de "fecha final" dependiendo de que haya o no
     */
    function fecha_final($date_fin){
        if($date_fin == '') //recordatorio: comprobar que devuelve si no se rellena el campo
            return null;
        else
            return $date_fin;
    }

    /*
     * Este proceso estára dentro de los detalles de la incidencia, por lo tanto se le pasará por URL la
     * id de la incidencia.
     */
    $incidencia = $_GET['incidencia'];


    $sql = "INSERT INTO sanciones (idIncidencia, tipoSancion, fecha_inicio, fecha_fin, observacion, idMotivo)
        VALUES (".$incidencia.", ".$_POST['sanction-type'].", ".$_POST['initial-date'].", ".fecha_final($_POST['end-date']).", '".$_POST['observations'].",' ".$_POST['reason-type'].")";

    $obj->consultas($sql);

    $obj->cerrarConexion();

?>