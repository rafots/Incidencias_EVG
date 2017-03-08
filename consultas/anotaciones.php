<?php

require_once "../procedimientos/procedimientos.php";

$objeto = new procedimientos();
$objeto->conectar();
$consulta="Select numAnotacion,tipos_Anotaciones.nombre as tipoAnotaciones,anotaciones.nia as anotacion,leida,verProfesores,nombreCompleto from anotaciones inner join tipos_Anotaciones on anotaciones.tipoAnotacion=tipos_anotaciones.tipoAnotacion inner JOIN alumnos on anotaciones.nia = alumnos.nia WHERE userCreacion LIKE 't'";
$objeto->consultas($consulta);

require_once "../paginas/coordinador.php";
echo '<h4>Anotaciones</h4>';
while($fila=$objeto->devolverFilas()){
    echo '<h7>Tipo de anotacion:'.$fila["numAnotacion"].'</h7>';
    echo '<br/>';
    echo '<h7>Descripcion de la anotacion:'.$fila["tipoAnotaciones"].'</h7>';
    echo '<br/>';
    echo '<h7>NIA del alumno implicado:'.$fila["anotacion"].'</h7>';
    echo '<br/>';
    echo '<h7>Nombre del Alumno:'.$fila["nombreCompleto"].'</h7>';
    echo '<br/>';
    echo '<a href="anotacionesmostrar.php?numAnotacion='.$fila["numAnotacion"].'">Ver la anotacion en detalle</a>';
    echo '<br/><br/>';
}
echo'    
         </article>
    </div>
    </div>
                    </div>
                    <!-- /CUERPO DE LA PÁGINA -->
                </div>
            
            </body>
            </html>
            ';
?>