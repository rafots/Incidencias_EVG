<?php
/**
 * Created by PhpStorm.
 * User: 2daw01
 * Date: 03/03/2017
 * Time: 10:55
 */

    session_start();
    if(isset($_SESSION["usuario"])){

        require '../procedimientos/procedimientos.php';

        $obj = new procedimientos();
        $obj->conectar();

        $sql = "INSERT INTO sanciones (idIncidencia, nia, tipoSancion, fecha_inicio, fecha_fin, observacion, idMotivo)
        VALUES (NULL , '".$_POST['student']."', ".$_POST['sanction-type'].", '".$_POST['initial-date']."', '".$_POST['end-date']."', '".$_POST['observations']."', ".$_POST['reason-type'].")";
        echo $sql;
        $obj->consultas($sql);

        $obj->cerrarConexion();


        if($_SESSION["activa"]=='c'){
            header('Location: ../paginas/coordinador.php');
        }else{
            header('Location: ../paginas/tutor.php');
        }

    }else{

        echo 'Acceso denegado';

    }
?>