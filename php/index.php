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
        <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
        <script src="jq/slider.js"></script>
        <title>GuiaRest</title>
    </head>
    <body class="fondo">
        <?php
        if($_SESSION['ucontrol']){
            header("location: usuario.php");
        }
        if($_SESSION['ncontrol']){
            header("location: negocio.php");
        }
        ?>
        <!-- Construccion pagina -->
        <div class="baner">
            <span class="titulo">GuiaRest</span>
        </div>
        <div class="descripcion">
            <span class="textos">Si sos usuario registrate y empeza a comer! y si sos un Negocio registrate y empeza a vender! </span>
        </div>
        <div id="slideshow">
            <div>
                <img src="imagenes/imagen1.png">
            </div>
            <div>
                <img src="imagenes/imagen2.png">
            </div>
            <div>
                <img src="imagenes/imagen3.png">
            </div>
            <div>
                <img src="imagenes/imagen4.png">
            </div>
            <div>
                <img src="imagenes/imagen5.png">
            </div>
        </div>
        <div class="pie">
            Registrarse como:
        </div>
        <div class="linkUsuario">
            <a href="reguser.html">Usuario</a>
        </div>
        <div class="linkNegocio">
            <a href="regnegocio.php">Negocio</a>
        </div>
       
        <form action="comprobar.php" method="POST">
            <div class="textUsuario"><input type="text" name="usuario" placeholder="Usuario" size="14"></div>
            <div class="textClave"><input type="password" name="clave" placeholder="Password" size="14"></div>
            <div class="entrar"><input type="submit" name="envio" value="Entrar"></div>
        </form>
        
    </body>
</html>
