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
        <div class="infomenu">Seleccione el menu que desea modificar</div>
        <div class="editarmenus">
            <?php
                for($cont=0;$cont<$elementos;$cont++){
                echo '<a href="editarmenu.php?menu='.$cont.'">'.$nombreMenu[$cont].'</a><br><br>';
                }
            ?>

        </div>
        <?php
        }
        else{
            header("location: index.php");
        }
        ?>
    </body>
</html>
