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
        <?php if($_GET['valor']==='1'){ ?>
        <div class="infomenu">Ventas desde <?php echo $_GET['fecha1']; ?> hasta <?php echo $_GET['fecha2']; ?></div>
        <div class="detalles">
            <table border="1">
                <tr>
                    <td>Menu</td>
                    <td>Estado actual</td>
                    <td>Unidades vendidadas</td>
                    <td>Total</td>
                </tr>
                <?php for($cont=0;$cont<$_GET['elementos'];$cont++){
                echo "<tr>";
                    echo "<td>{$_SESSION['nombremenu'][$cont]}</td>";
                    if($_SESSION['estadomenu'][$cont]=1){
                        echo '<td><font color="green">Habilitado</font></td>';
                    }
                    else{
                        echo '<td><font color="red">Deshabilitado</font></td>';
                    }
                    echo "<td>{$_SESSION['cantidad'][$cont]}</td>";
                    echo "<td>{$_SESSION['totalmenu'][$cont]}</td>";
                    $total=$total+$_SESSION['totalmenu'][$cont];
                    $unidades=$unidades+$_SESSION['cantidad'][$cont];
                }
                ?>
            </table>
            <br>
            <table border="1">
                <tr>
                    <td>Total</td>
                    <td>Unidades</td>
                    <td>Ventas</td>
                </tr>
                <tr>
                    <td></td>
                    <td><?php echo $unidades; ?></td>
                    <td>$<?php echo $total; ?></td>
                </tr>
            </table>
        <?php } ?>
        <?php if($_GET['valor']==='2'){ ?>
            <div class="detalles">
            <img src="imagenes/histograma.php">
        <?php } ?>
            <form action="reportes.php">
                <br><input type="submit" value="Volver">
            </form>
        </div>
        <?php if($_GET['valor']==='3'){ ?>
            <div class="detalles">
            <img src="imagenes/histograma2.php">
        <?php } ?>
            <form action="reportes.php">
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
