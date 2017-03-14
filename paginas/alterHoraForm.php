<?php
session_start();

if(!isset($_SESSION['gestor'])){
    echo "Acceso prohibido";

}else{
    $_SESSION["activa"]="g";
    echo '
     <!DOCTYPE html>
     <html lang="en">
     <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="../sources/ajaxGestor.js" type="text/javascript"></script>
        <meta charset="UTF-8">
        <title>Panel Gestor</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <link type="text/css" href="../sources/bootstrap.css" rel="stylesheet">
        <link type="text/css" href="../sources/comun.css" rel="stylesheet">
        <script type="text/javascript" src="../sources/bootstrap.js"></script>
        
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        
     </head>
     <body>
        <div class="container caja">
            <header>
                <div class="row vertical-align text-center">
                    <div class="col-md-6 col-sm-6">
                        <img class="img-responsive img-center" src="../imagenes/logotipo.png"/>
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <div id="title-cdi">GESTOR</div>
                    </div>
                    <div class="col-md-3 col-sm-3">';
    echo '<br/>';
    echo $_SESSION['nombre'];echo '
                    </div>
                </div>
            </header>
            
            <hr>
            
    <div class="container">
        <div class="row">
            <div class="col-sm-3 col-md-3">
                <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" id="secciongestor" data-parent="#accordion" href="#collapseOne"><span class="glyphicon glyphicon-book text-success"></span> Secciones</a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in">
                           
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" id="horas"><span class="glyphicon glyphicon-pencil text-success"></span> Horas</a>
                            </h4>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" id="etapas"><span class="glyphicon glyphicon-pencil text-success"></span> Etapas</a>
                            </h4>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a href="cerrarSesionGestor.php"><span class="glyphicon glyphicon-log-out text-success"></span> Cerrar sesion</a>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-sm-8 col-md-8" id="cuerpo">
                ';
                echo '<div>';
                echo '<form method="get" action="../consultas/conAlterHora.php">';
                echo '<label>Nombre de tipo de anotacion</label>';
                echo '<div>';
                echo '<input type="hidden" name="cod" value="'.$_GET["codAntiguo"].'">';
                echo '<input type="text" name="texto" value="'.$_GET["nombreAntiguo"].'" required="required">';
                echo '</div>';
                echo '<div>';
                echo '<input type="submit" value="Modificar hora">';
                echo '</div>';
                echo '</div>';
                echo'
            </div>
        </div>
    </div>
    </body>
</html>
    ';
}
?>