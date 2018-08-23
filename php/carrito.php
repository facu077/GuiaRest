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
        if($_SESSION['ucontrol']){
        ?>
        <div class="baner">
            <span class="titulo">GuiaRest</span>
            <span class="nombre"><?php echo "Usuario {$_SESSION['usuario']} "?></span>
            <span class="lkModificar"><button><a href="modificaruser.php">modificar datos</a></button></span>
            <span class="lkSalir"><button><a href="salir.php">salir</a></button></span>
        </div>
        <div class="infomenu">Carrito de compras</div>
        <div class="btnCrear"><a href="usuario.php"><button>Volver</button></a></div>
        <div class="editarmenus">
            <table border="1">
                <tr>
                    <td>Negocio</td>
                    <td>Nombre del Producto</td>
                    <td>Cantidad</td>
                    <td>Precio</td>
                    <td>Subtotal</td>
                </tr>
                <?php
                $total=0;
                for($n=0;$n<$_SESSION['menus'];$n++){
                    echo '<tr>';
                        echo '<td>'.$_SESSION['vNegocio'][$n].'</td>';
                        echo '<td>'.$_SESSION['vNombre'][$n].'</td>';
                        echo '<td>'.$_SESSION['vCantidad'][$n].'</td>';
                        echo '<td>'.$_SESSION['vPrecio'][$n].'</td>';
                        $subtotal['$n']=$_SESSION['vCantidad'][$n]*$_SESSION['vPrecio'][$n];
                        $total=$total+$subtotal['$n'];
                        echo '<td>'.$subtotal['$n'].'</td>';
                        echo '<td><a href="eliminarCarrito.php?menu='.$n.'"><button>Eliminar</button></a></td>';
                    echo '</tr>';
                }
                ?>
            </table>
            <br>
            <div class="subeditarmenus">
            <table border="1">
                    <tr>
                        <td>Total</td>
                        <td><?php echo $total; ?></td>
                        <td><a href="eliminarCarrito.php?todo=true"><button>Eliminar todo</button></a></td>
                    </tr>
                
            </table>
            </div>    
        <br>
        <form action="confirmar.php" method="POST">
            <input type="checkbox" name="envio" value="enviar">Envio a domicilio<br>
            <input type="hidden" name="total" value="<?php echo $total; ?>">
            <input type="submit" value="Comprar">
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
