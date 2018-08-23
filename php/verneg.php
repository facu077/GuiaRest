<?php
session_start();
$_SESSION['id']=$_GET['idneg'];
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
        if($_SESSION['ucontrol']){
        ?>
        
        <div class="baner" style="z-index: 1">
            <span class="titulo">GuiaRest</span>
            <span class="nombre"><?php echo "Usuario {$_SESSION['usuario']} "?></span>
            <span class="lkModificar"><button><a href="modificaruser.php">modificar datos</a></button></span>
            <span class="lkSalir"><button><a href="salir.php">salir</a></button></span>
            <span><a href=carrito.php class="carrito"><img class="imgcarrito" src="imagenes/ecarrito.png"> Carrito de compras (<?php echo $_SESSION['menus']; ?>)</a></span>
        </div>
        <div class="btnCrear"><button><a href="buscar.php">Volver</a></button></div>
        <div class="infomenu">Los menus que ofrece este negocio son:</div>
        <div id="tabs">
            <ul class="menus">
                <?php
                $n=1;
                for($cont=0;$cont<$elementos;$cont++){
                    if($estadomenu[$cont]==='1'){
                    echo "<li><a href=\"#tabs-$n\">$nombreMenu[$cont]</a></li>";
                    $n++;
                    }
                }
                ?>
            </ul>
            <?php 
            $n=1;
            for($cont=0;$cont<$elementos;$cont++){
                if($estadomenu[$cont]==='1'){
                echo '<div id="tabs-'.$n.'">';
                echo '<p class="menudescripcion">'.$descripcionmenu[$cont].'</p>';
                echo '<img class="foto" src="importados/'.$fotomenu[$cont].'.png">';
                echo '<p class="precio">Precio: $'.$preciomenu[$cont].'</p>';
                echo '<div class="compra">';
                    echo 'Cuantas unidades deseas comprar?<br>';
                        echo '<form action="agregarcarrito.php" method="POST">';
                        echo '<input type="text" name="cantidad" size=5px>';
                        echo '<input type="hidden" name="idmenu" value="'.$idmenu[$cont].'">';
                        echo ' <input type="submit" name="agregar" value="Agregar a carrito">';
                        echo '</form>';
                echo '</div>';
                echo '</div>';
                }
                
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
