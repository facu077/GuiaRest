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
        <?php if($_GET['valor']==='1'){ ?>
        <div class="infomenu">Ventas de las empresas desde <?php echo $_GET['fecha1']; ?> hasta <?php echo $_GET['fecha2']; ?></div>
        <div class="detalles">
            <table border="1">
                <tr>
                    <td>ID</td>
                    <td>Negocio</td>
                    <td>Ventas</td>
                    <td>Total importes</td>
                </tr>
                <?php for($cont=0;$cont<$_GET['elementos'];$cont++){
                echo "<tr>";
                    echo "<td>{$_SESSION['idneg'][$cont]}</td>";
                    echo "<td>{$_SESSION['nombreneg'][$cont]}</td>";
                    echo "<td>{$_SESSION['ventas'][$cont]}</td>";
                    echo "<td>$ {$_SESSION['total'][$cont]}</td>";
                echo "</tr>";
                }
                ?>
            </table>
        <?php } ?>
        <?php if($_GET['valor']==='2'){ ?>
        <div class="infomenu">Compras de los usuarios desde <?php echo $_GET['fecha1']; ?> hasta <?php echo $_GET['fecha2']; ?></div>
        <div class="detalles">
            <table border="1">
                <tr>
                    <td>ID</td>
                    <td>Usuario</td>
                    <td>Compras</td>
                    <td>Total importes</td>
                </tr>
                <?php for($cont=0;$cont<$_GET['elementos'];$cont++){
                echo "<tr>";
                    echo "<td>{$_SESSION['idneg'][$cont]}</td>";
                    echo "<td>{$_SESSION['nombreneg'][$cont]}</td>";
                    echo "<td>{$_SESSION['ventas'][$cont]}</td>";
                    echo "<td>$ {$_SESSION['total'][$cont]}</td>";
                echo "</tr>";
                }
                ?>
            </table>
        <?php } ?>
        <?php if($_GET['valor']==='3'){ ?>
        <div class="infomenu">Ventas por tags desde <?php echo $_GET['fecha1']; ?> hasta <?php echo $_GET['fecha2']; ?></div>
        <div class="detalles">
            <table border="1">
                <tr>
                    <td>ID</td>
                    <td>Tag</td>
                    <td>Ventas</td>
                    <td>Total importes</td>
                </tr>
                <?php for($cont=0;$cont<$_GET['elementos'];$cont++){
                echo "<tr>";
                    echo "<td>{$_SESSION['idneg'][$cont]}</td>";
                    echo "<td>{$_SESSION['nombreneg'][$cont]}</td>";
                    echo "<td>{$_SESSION['ventas'][$cont]}</td>";
                    echo "<td>$ {$_SESSION['total'][$cont]}</td>";
                echo "</tr>";
                }
                ?>
            </table>
        <?php } ?>
        <?php if($_GET['valor']==='4'){ ?>
        <div class="infomenu">Ventas por zona desde <?php echo $_GET['fecha1']; ?> hasta <?php echo $_GET['fecha2']; ?></div>
        <div class="detalles">
            <table border="1">
                <tr>
                    <td>Zona</td>
                    <td>Ventas</td>
                    <td>Total importes</td>
                </tr>
                <?php for($cont=0;$cont<$_GET['elementos'];$cont++){
                echo "<tr>";
                    echo "<td>{$_SESSION['nombreneg'][$cont]}</td>";
                    echo "<td>{$_SESSION['ventas'][$cont]}</td>";
                    echo "<td>$ {$_SESSION['total'][$cont]}</td>";
                echo "</tr>";
                }
                ?>
            </table>
        <?php } ?>
            
        <form action="adminreportes.php">
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
