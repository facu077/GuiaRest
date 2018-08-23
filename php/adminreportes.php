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
        if($_SESSION['acontrol']){
        ?>
        <div class="baner">
            <span class="titulo">GuiaRest</span>
            <span class="nombre"><?php echo "Administrador {$_SESSION['usuario']} "?></span>
            <span class="lkSalir"><button><a href="salir.php">salir</a></button></span>
        </div>
        <div class="infomenu">Reportes</div>
        <div class="detalles">
            <form action="averreportesql.php" method="POST">
                Ventas de las empresas realizadas desde <input type="date" name="fecha1" size="10"> 
                hasta <input type="date" name="fecha2" size="10">
                <input type="hidden" name="valor" value="1">
                <input type="submit" value="Ver">
            </form>
            <br>
            <form action="averreportesql.php" method="POST">
                Compras de los usuarios desde <input type="date" name="fecha1" size="10"> 
                hasta <input type="date" name="fecha2" size="10">
                <input type="hidden" name="valor" value="2">
                <input type="submit" value="Ver">
            </form>
            <br>
            <form action="averreportesql.php" method="POST">
                Ventas por tags desde <input type="date" name="fecha1" size="10"> 
                hasta <input type="date" name="fecha2" size="10">
                <input type="hidden" name="valor" value="3">
                <input type="submit" value="Ver">
            </form>
            <br>
            <form action="averreportesql.php" method="POST">
                Ventas por zona desde <input type="date" name="fecha1" size="10"> 
                hasta <input type="date" name="fecha2" size="10">
                <input type="hidden" name="valor" value="4">
                <input type="submit" value="Ver">
            </form>
            <form action="administrar.php">
                <br><input type="submit" value="Volver">
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
