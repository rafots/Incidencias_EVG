<?php
session_start();

    require '../procedimientos/procedimientos.php';
    $obj = new procedimientos();
    $obj->conectar();
    $query = "SELECT idUsuario,usuario,pass,profesor,gestor,tutor,coordinador FROM magentoe_incidenciasevg.profesores WHERE usuario = ?";
    $sentencia = $obj->consultasPreparadas($query);
    $sentencia->bind_param('s', $user);
    $user = $_POST["user"];
    $sentencia->execute();
    $sentencia->bind_result($idUsuario,$usuario,$pass,$profesor,$gestor,$tutor,$coordinador);
    $sentencia->fetch();
    $sentencia->close();
    if (password_verify($_POST["pass"], $pass))
    {
        if($coordinador == 1 && $tutor==1)
        {
            $_SESSION['usuario']=$usuario;
            $_SESSION['coordinador']=$coordinador;
            $query = 'SELECT t1.codEtapa, t2.nombre, idSeccion FROM etapas t1 
	                    INNER JOIN profesores t2 
                            ON (t1.coordinador = t2.idUsuario)
                            INNER JOIN secciones ON (secciones.tutor = t2.idUsuario)
                        WHERE t2.idUsuario = ? ';

            $sentencia = $obj->consultasPreparadas($query);
            $sentencia->bind_param('i',$_SESSION['idUsuario']);
            $_SESSION['idUsuario']=$idUsuario;
            $sentencia->execute();
            $sentencia->bind_result($codEtapa, $nombre, $idSeccion);
            $sentencia->fetch();
            $_SESSION['codEtapa']=$codEtapa;
            $_SESSION['idSeccion']=$idSeccion;
            $_SESSION['nombre'] = $nombre;
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
                $query = 'SELECT t1.codEtapa, t2.nombre, idSeccion FROM etapas t1 
	                    INNER JOIN profesores t2 
                            ON (t1.coordinador = t2.idUsuario)
                            INNER JOIN secciones ON (secciones.tutor = t2.idUsuario)
                        WHERE t2.idUsuario = ? ';

                $sentencia = $obj->consultasPreparadas($query);
                $sentencia->bind_param('i',$_SESSION['idUsuario']);
                $_SESSION['idUsuario']=$idUsuario;
                $sentencia->execute();
                $sentencia->bind_result($codEtapa, $nombre, $idSeccion);
                $sentencia->fetch();
                $_SESSION['codEtapa']=$codEtapa;
                $_SESSION['idSeccion']=$idSeccion;
                $_SESSION['nombre'] = $nombre;
                header('Location: ../paginas/coordinador.php');
            }
            else
            if($tutor == 1)
            {
                $_SESSION['usuario']=$usuario;
                $_SESSION['tutor']=$tutor;
                $query = 'SELECT t1.codEtapa, t2.nombre, idSeccion FROM etapas t1 
	                    INNER JOIN profesores t2 
                            ON (t1.coordinador = t2.idUsuario)
                            INNER JOIN secciones ON (secciones.tutor = t2.idUsuario)
                        WHERE t2.idUsuario = ? ';

                $sentencia = $obj->consultasPreparadas($query);
                $sentencia->bind_param('i',$_SESSION['idUsuario']);
                $_SESSION['idUsuario']=$idUsuario;
                $sentencia->execute();
                $sentencia->bind_result($codEtapa, $nombre, $idSeccion);
                $sentencia->fetch();
                $_SESSION['codEtapa']=$codEtapa;
                $_SESSION['idSeccion']=$idSeccion;
                $_SESSION['nombre'] = $nombre;
                $_SESSION['profesor']=$profesor;
                header('Location: ../paginas/tutor.php');
            }
            else{
                $_SESSION['usuario']=$usuario;
                $_SESSION['profesor']=$profesor;
                $query = 'SELECT t1.codEtapa, t2.nombre, idSeccion FROM etapas t1 
	                    INNER JOIN profesores t2 
                            ON (t1.coordinador = t2.idUsuario)
                            INNER JOIN secciones ON (secciones.tutor = t2.idUsuario)
                        WHERE t2.idUsuario = ? ';

                $sentencia = $obj->consultasPreparadas($query);
                $sentencia->bind_param('i',$_SESSION['idUsuario']);
                $_SESSION['idUsuario']=$idUsuario;
                $sentencia->execute();
                $sentencia->bind_result($codEtapa, $nombre, $idSeccion);
                $sentencia->fetch();
                $_SESSION['codEtapa']=$codEtapa;
                $_SESSION['idSeccion']=$idSeccion;
                $_SESSION['nombre'] = $nombre;
                header('Location: ../paginas/profesor.php');
            }
    }
    else{
        header('Location: ../paginas/inicioSesion.php');
    }
    $sentencia->close();