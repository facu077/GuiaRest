<?php
session_start();
include("./vertags.php");
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
        <title>GuiaRest</title>
        <link rel="stylesheet" href="estilos/PaginaClientes.css">
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
            <span><a href=carrito.php class="carrito"><img class="imgcarrito" src="imagenes/ecarrito.png"> Carrito de compras (<?php echo $_SESSION['menus']; ?>)</a></span>
        </div>
        <div class="infotag" title="La busqueda por tag mostrara primero los resultados mas cercanos"><img src="imagenes/info.png"></div>
        <div class="subtitulo">¿Que quieres comer?</div>
        <div class="infosubtitulo">Buscar por:</div>
        <div class="formulario">
            <form action="buscarsql.php" method="POST">
                <br>
                Tags <br>
                <select name="tags" style="width: 173px">
                    <option value="na">Ninguno</option>
                    <?php for($n=0;$n<$elementos;$n++){
                        echo '<option value="'.$idtag[$n].'">'.$nombreTag[$n].'</option>';
                    }?>
                </select><br>
                Nombre del negocio <br><input type="text" name="nombreneg"><br>
                Direccion <br><input type="text" name="direccion"><br>
                Email <br><input type="text" name="email"><br>
                Telefono <br><input type="text" name="telefono"><br><br>
                <input type="submit" name="buscar" value="Buscar">
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
