<?php
session_start();
error_reporting(0);
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
        <link rel="stylesheet" href="estilos/general.css">
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
        <?php
        if($_SESSION['nada']){
        ?>
            <div class="nomUsuario">
                No seleccionaste ningun campo de busqueda
                <br><a href='usuario.php'><button>volver</button></a>
            </div>
        <?php
        }
        else{
        $elementos=$_SESSION['cantneg'];
        ?>
        <div class="nomUsuario">La busqueda dio los siguientes resultado:</div>
        <div class="nomContraseña">
            <?php
            if($_SESSION['negnombre0']){
            for($n=0;$n<$elementos;$n++){
                echo '<div>Negocio: '.$_SESSION['negnombre'.$n].'<a href="verneg.php?idneg='.$_SESSION['idnegocio'.$n].'"><img src="imagenes/icono-vermas.png"></a></div><br>';
            }
            }
            else{
                echo 'No se encontraron resultados<br>';
            }
            ?>
            <br><a href='usuario.php'><button>volver</button></a>
        </div>
        <?php
        }}
        else{
            header("location: index.php");
        }
        ?>
    </body>
</html>
