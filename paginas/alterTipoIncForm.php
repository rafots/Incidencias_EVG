<?php
    echo '<div>';
    echo '<form method="get" action="../consultas/conAlterTipoIncidencia.php">';
    echo '<label>Nombre de tipo de incidencia</label>';
    echo '<div>';
    echo '<input type="text" name="cod" value="'.$_GET["codAntiguo"].'" id="ocultar">';
    echo '<input type="text" name="texto" value="'.$_GET["nombreAntiguo"].'">';
    echo '</div>';
    echo '<div>';
    echo '<label>¿Quien gestiona esta incidencia?</label>';
    echo '<select name="gestiona">';
    echo '<option value="T">Tutor</option>';
    echo '<option value="C">Coordinador</option>';
    echo '</select>';
    echo '</div>';
    echo '</div>';
?>
