<?php
session_start();
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="estilos/general.css">
        <title>GuiaRest</title>
    </head>
    <body class="fondo">
        <?php
        if($_SESSION['ncontrol']){
        ?>
        <div class="baner">
            <span class="titulo">Nuevo Menu</span>
        </div>
        <form enctype="multipart/form-data" action="crearcomidasql.php" method="POST">
            <div class="nomContraseña">Nombre</div>
            <div class="txtContraseña"><input type="text" name="nombre" size="40"></div>
            <div class="negNomNegocio">Foto</div>
            <div class="txtNomNegocio"><input type="file" name="foto" size="40" id="foto"></div>
            <div class="negNombre">Precio</div>
            <div class="txtNegNombre">$<input type="text" name="precio" size="16"></div>
            <div class="negEmail">Estado</div>
            <div class="radiohab"><input type="radio" name="estado"  value="habilitado">habilitado</div>
            <div class="radiodes"><input type="radio" name="estado"  value="deshabilitado">deshabilitado</div>
            <div class="descripcioncomida">Descripcion</div>
            <div class="txtdescripcioncomida"><textarea name="descripcion"></textarea></div>
            <div class="btnComidaAceptar"><input type="submit" name="aceptar" value="Aceptar"></div>
        </form>
        <form action="negocio.php">
            <div class="btnComidaCancelar"><input type="submit" name="cancelar" value="Cancelar"></div>
        </form>
        <?php
        }
        else{
            header("location: index.php");
        }
        ?>
    </body>
</html>
