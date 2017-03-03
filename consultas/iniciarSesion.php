<?php
session_start();
/**
 * Created by PhpStorm.
 * User: Rafa
 * Date: 26/02/2017
 * Time: 20:37
 */
    require '../procedimientos/procedimientos.php';

    $obj = new procedimientos();
    $obj->conectar();
    $query = "SELECT usuario,pass,profesor,gestor,tutor,coordinador FROM magentoe_incidenciasevg.profesores WHERE usuario = ?";
    $sentencia = $obj->consultasPreparadas($query);
    $sentencia->bind_param('s', $user);
    $user = $_POST["user"];
    $sentencia->execute();
    $sentencia->bind_result($usuario,$pass,$profesor,$gestor,$tutor,$coordinador);
    $sentencia->fetch();
    if (password_verify($_POST["pass"], $pass))
    {
        if($coordinador == 1 && $tutor==1)
        {
            $_SESSION['usuario']=$usuario;
            $_SESSION['coordinador']=$coordinador;
            $_SESSION['tutor']=$tutor;
            $_SESSION['profesor']=$profesor;
            header('Location: ../paginas/coordinador.php');
        }
        else
            if($coordinador == 1 && $tutor==0)
            {
                $_SESSION['usuario']=$usuario;
                $_SESSION['coordinador']=$coordinador;
                $_SESSION['profesor']=$profesor;
                header('Location: ../paginas/coordinador.php');
            }
            else
            if($tutor == 1)
            {
                $_SESSION['usuario']=$usuario;
                $_SESSION['tutor']=$tutor;
                $_SESSION['profesor']=$profesor;
                header('Location: ../paginas/tutor.php');
            }
            else
                    $_SESSION['usuario']=$usuario;
                    $_SESSION['profesor']=$profesor;
                    header('Location: ../paginas/profesor.php');

    }
    $sentencia->close();