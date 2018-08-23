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
        <title>GuiaRest</title>
        <link rel="stylesheet" href="estilos/PaginaClientes.css">
        <link rel="stylesheet" href="estilos/jquery-ui.css">
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <script src="jq/tabs.js"></script>
        <link rel="stylesheet" href="/resources/demos/style.css">
    </head>
    <body class="fondo">
        <?php
        if($_SESSION['ncontrol']){
        ?>
        
        <div class="baner" style="z-index: 1">
            <span class="titulo">GuiaRest</span>
            <span class="nombre"><?php echo "Negocio {$_SESSION['nombre_negocio']} "?></span>
            <span class="lkModificar"><button><a href="modificarneg.php">modificar datos</a></button></span>
            <span class="lkSalir"><button><a href="salir.php">salir</a></button></span>
        </div>
        <div class="infomenu">Mis Menus</div>
        <div class="btnCrear"><button><a href="crearcomida.php">Crear</a></button></div>
        <div class="btnEditar"><button><a href="editarmenuelegir.php">Editar</a></button></div>
        <div class="btnHD"><button><a href="habdes.php">Habilitar/Deshabilitar</a></button></div>
        <div class="btnReportes"><a href="reportes.php"><button>Reportes</button></a></div>
        <div id="tabs">
            <ul class="menus">
                <?php
                $n=1;
                for($cont=0;$cont<$elementos;$cont++){
                    echo "<li><a href=\"#tabs-$n\">$nombreMenu[$cont]</a></li>";
                    $n++;
                }
                ?>
            </ul>
            <?php 
            $n=1;
            for($cont=0;$cont<$elementos;$cont++){
                echo '<div id="tabs-'.$n.'">';
                echo '<p class="menudescripcion">'.$descripcionmenu[$cont].'</p>';
                echo '<img class="foto" src="importados/'.$fotomenu[$cont].'.png">';
                echo '<p class="precio">Precio: $'.$preciomenu[$cont].'</p>';
                if($estadomenu[$cont]==='1'){
                    echo '<p class="estadohab">Habilitado</p>';
                }
                else{
                    echo '<p class="estadodes">Deshabilitado</p>';
                }
                echo '</div>';
                $n++;
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
