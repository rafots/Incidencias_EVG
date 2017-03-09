<?php
    session_start();
    if(isset($_SESSION['coordinador']) && $_SESSION["activa"]=="c"){
                coordinador();
    }else{
        if(isset($_SESSION['tutor']) && $_SESSION["activa"]=="t"){
                    tutor();
        }else{
            if(isset($_SESSION['profesor']) && $_SESSION["activa"]=="p")
                    profesor();
            else{
                session_destroy();
                echo 'no tienes permiso para acceder a esta pagina';
            }
        }
    }
?>