<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Error</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="estilos/general.css">
    </head>
    <body class="fondo">
        <div class="baner">
            <span class="titulo">GuiaRest</span>
        </div>
        <div class="nomUsuario">Cuanta deshabilitada. Contacte a un admnistrador.</div>
        <div class="nomContraseña"><a href="index.php">volver</a></div>
    </body>
</html>
