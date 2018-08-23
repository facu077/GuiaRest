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
        if($_SESSION['ncontrol']){
        ?>
        <div class="baner">
            <span class="titulo">GuiaRest</span>
            <span class="nombre"><?php echo "Negocio {$_SESSION['nombre_negocio']} "?></span>
            <span class="lkSalir"><button><a href="salir.php">salir</a></button></span>
        </div>
        <div class="infomenu">Reportes</div>
        <div class="detalles">
            <form action="verreportesql.php" method="POST">
                Ventas realizadas desde <input type="date" name="fecha1" size="10"> 
                hasta <input type="date" name="fecha2" size="10">
                <input type="hidden" name="valor" value="1">
                <input type="submit" value="Ver">
            </form>
            <br>
            <form action="verreportesql.php" method="POST">
                Histograma de ventas por horas desde <input type="date" name="fecha1" size="10"> 
                hasta <input type="date" name="fecha2" size="10">
                <input type="hidden" name="valor" value="2">
                <input type="submit" value="Ver">
            </form>
            <br>
            <form action="verreportesql.php" method="POST">
                Histograma de ventas por zonas
                <input type="hidden" name="valor" value="3">
                <input type="submit" value="Ver">
            </form>
            <form action="negocio.php">
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
