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
        <link rel="stylesheet" href="estilos/PaginaClientes.css">
        <title>GuiaRest</title>
    </head>
    <body class="fondo">
        <?php
        if($_SESSION['ucontrol']){
        ?>
        <div class="baner">
            <span class="titulo">GuiaRest</span>
            <span class="nombre"><?php echo "Usuario {$_SESSION['usuario']} "?></span>
            <span class="lkModificar"><button><a href="modificaruser.php">modificar datos</a></button></span>
            <span class="lkSalir"><button><a href="salir.php">salir</a></button></span>
        </div>
        <div class="detalles">
            Compra realizada con exito!
            <form action="usuario.php" method="POST">
                <input type="submit" value="volver">
            </form>
            
        </div>
        <?php
        }
        else{
            header("location: index.php");
        }
        ?>
    </body>
</html>
