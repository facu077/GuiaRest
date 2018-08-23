<?php
session_start();
include("./vermenus.php");
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
            <span class="titulo">Editar Menu</span>
        </div>
        <form enctype="multipart/form-data" action="editarmenusql.php" method="POST">
            <div class="nomContraseña">Nombre</div>
            <div class="txtContraseña"><input type="text" name="nombre" size="40" value="<?php echo "{$nombreMenu[$_GET["menu"]]}" ?>"></div>
            <div class="negNomNegocio">Foto</div>
            <div class="txtNomNegocio"><input type="file" name="foto" size="40" id="foto"></div>
            <div class="negNombre">Precio</div>
            <div class="txtNegNombre">$<input type="text" name="precio" size="16" value="<?php echo "{$preciomenu[$_GET["menu"]]}" ?>"></div>
            <div class="descripcioncomida">Descripcion</div>
            <div class="txtdescripcioncomida"><textarea name="descripcion"><?php echo "{$descripcionmenu[$_GET["menu"]]}" ?></textarea></div>
            <input type="hidden" value="<?php echo "{$fotomenu[$_GET["menu"]]}" ?>" name="fotoubicacion">
            <input type="hidden" value="<?php echo "{$idmenu[$_GET["menu"]]}" ?>" name="idmenu">
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
