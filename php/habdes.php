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
        <link rel="stylesheet" href="estilos/PaginaClientes.css">
        <title>GuiaRest</title>
    </head>
    <body class="fondo">
        <?php
        if($_SESSION['ncontrol']){
        ?>
        <div class="baner">
            <span class="titulo">Editar menus</span>
        </div>
        <div class="infomenu">Cambiar estados</div>
        <div class="editarmenus">
            <table border="1">
                <?php for($cont=0;$cont<$elementos;$cont++){
                echo '<tr>';
                    echo '<td>'.$nombreMenu[$cont].'</td>';
                    if($estadomenu[$cont]==='1'){
                        echo '<td><font color="green">Habilitado</font></td>';
                    }
                    else{
                        echo '<td><font color="red">Deshabilitado</font></td>';
                    }
                    echo '<td><a href=habdessql.php?estado='.$estadomenu[$cont].'&idmenu='.$idmenu[$cont].'">Cambiar</a></td>';
                echo '</tr>';
                }?>
            </table>
        <br>
        <form action="negocio.php">
            <input type="submit" value="Aceptar">
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
