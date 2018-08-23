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
        if($_SESSION['ucontrol']){
        ?>
        <div class="baner">
            <span class="titulo">GuiaRest</span>
            <span class="nombre"><?php echo "Usuario {$_SESSION['usuario']} "?></span>
            <span class="lkModificar"><button><a href="modificaruser.php">modificar datos</a></button></span>
            <span class="lkSalir"><button><a href="salir.php">salir</a></button></span>
        </div>
        <div class="infomenu">Confirmar Compra</div>
        <div class="detalles">
            Total de la compra: $<?php echo $_POST['total']; ?><br>
            <form action="comprarsql.php" method="POST">
                <?php if($_POST['envio']=='enviar'){ ?>
                Direccion de envio: <input type="text" name="direccion" value="<?php echo $_SESSION['userdireccion']; ?>">
                <?php }
                else{ echo "Pasa a retirarlo";}?>
                <br><br>
                <input type="submit" value="Cancelar" name="boton">
                <input type="submit" value="Confirmar" name="boton">
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
