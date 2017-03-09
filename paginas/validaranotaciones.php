<?php
    session_start();
    if(isset($_SESSION['coordinador'])){
                coordinador();


    }else{
        if(isset($_SESSION['tutor'])){
                    tutor();
        }else{
            if(isset($_SESSION['profesor']))
                    profesor();

            else{
                session_destroy();
                echo 'no tienes permiso para acceder a esta pagina';
            }
        }
    }
?>