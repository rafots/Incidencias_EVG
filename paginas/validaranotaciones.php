<?php

    session_start();
    if(isset($_SESSION['coordinador'])){
        coordinador();
    }else{
        if(isset($_SESSION['tutor'])){
            tutor();
        }else{
            session_destroy();
            if(isset($_SESSION['profesor']))
                profesor();
            echo 'no tienes permiso para acceder a esta pagina';
        }
    }

?>