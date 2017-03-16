<?php
    session_start();
    if(isset($_SESSION['coordinador']) && $_SESSION["activa"]=="c"){
        $_SESSION["maxanot"]=10;
        coordinador();

    }else{
        if(isset($_SESSION['tutor']) && $_SESSION["activa"]=="t"){
            $_SESSION["maxanot"]=10;
            tutor();

        }else{
            if(isset($_SESSION['profesor']) && $_SESSION["activa"]=="p") {
                $_SESSION["maxanot"] = 10;
                profesor();
            }else{
                session_destroy();
                echo 'no tienes permiso para acceder a esta pagina';
            }
        }
    }
?>