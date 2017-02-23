<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form name="importar" method="post" action="recorrerArchivo.php" enctype="multipart/form-data" >
            <input id="file" type="file" name="file"/>
            <input type='submit' name='enviar'  value="Importar"  />
            <input type="hidden" value="upload" name="action" />
        </form>
    </body>
</html>
