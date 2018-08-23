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
        if($_SESSION['ucontrol']){
        ?>
        <div class="baner">
            <span class="titulo">Modificar Datos</span>
        </div>
        <div class="mapa">
            <img src="imagenes/mapa.png">
        </div>
        <form action="modificarusersql.php" method="POST">
            <div class="nomContraseña">Contraseña</div>
            <div class="txtContraseña"><input type="password" name="pass" size="40" value="<?php echo "{$_SESSION['userpass']}" ?>"></div>
            <div class="nomNombre">Nombre</div>
            <div class="txtNombre"><input type="text" name="nombre" size="16" value="<?php echo "{$_SESSION['usernombre']}" ?>"></div>
            <div class="nomApellido">Apellido</div>
            <div class="txtApellido"><input type="text" name="apellido" size="16" value="<?php echo "{$_SESSION['userapellido']}" ?>"></div>
            <div class="nomEmail">Email</div>
            <div class="txtEmail"><input type="text" name="email" size="40" value="<?php echo "{$_SESSION['useremail']}" ?>"></div>
            <div class="nomTelefono">Telefono</div>
            <div class="txtTelefono"><input type="text" name="telefono" size="40" value="<?php echo "{$_SESSION['usertelefono']}" ?>"></div>
            <div class="nomDireccion">Direccion</div>
            <div class="txtDireccion"><input type="text" name="direccion" size="40" value="<?php echo "{$_SESSION['userdireccion']}" ?>"></div>
            <div class="nomUbicacion">Ubicacion en el mapa</div>
            <div class="txtUbicacion"><input type="text" name="ubicacion" size="40" value="<?php echo "{$_SESSION['userubicacion']}" ?>"></div>
            <div class="btnAceptar"><input type="submit" name="aceptar" value="Aceptar"></div>
        </form>
        <form action="usuario.php">
            <div class="btnCancelar"><input type="submit" name="cancelar" value="Cancelar"></div>
        </form>
        <?php
        }
        else{
            header("location: index.php");
        }
        ?>
    </body>
</html>
