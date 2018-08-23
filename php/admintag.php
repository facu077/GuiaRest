<?php
session_start();
include("./vertags.php");
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
        <div class="infomenu">Administrar Tags</div>
        <div class="editarmenus">
            <?php 
            for($cont=0;$cont<$elementos;$cont++){
            echo '<form action="admintagsql.php" method="POST" id='.$cont.'></form>';
            }
            $ultimo=$elementos+1;
            echo '<form action="admintagsql.php" method="POST" id='.$ultimo.'></form>';
            ?>
                <table border="1">
                    <tr>
                        <td>ID</td>
                        <td>Detalle</td>
                        <td>Estado</td>
                        <td></td>
                    </tr>
                    <?php for($cont=0;$cont<$elementos;$cont++){ ?>
                    <tr>
                        <td><?php echo $idtag[$cont]; ?></td>
                        <td><input type="text" name="nombre" value="<?php echo $nombreTag[$cont]; ?>" form="<?php echo $cont; ?>"></td>
                        <td>
                            <select name="estado" form="<?php echo $cont; ?>">
                                <?php if($estadoTag[$cont]==='1'){ ?>
                                <option value="1" selected>Habilitado</option>
                                <option value="0">Deshabilitado</option>
                                <?php } else{?>
                                <option value="1">Habilitado</option>
                                <option value="0" selected>Deshabilitado</option>
                                <?php } ?>
                            </select>
                        </td>
                        <input type="hidden" name="id" value="<?php echo $idtag[$cont]; ?>" form="<?php echo $cont; ?>">
                        <td><input type="submit" value="Modificar" form="<?php echo $cont; ?>"></td>
                    </tr>
                    <?php } ?>
                    <tr>
                        <td>na</td>
                        <td><input type="text" name="nombre" form="<?php echo $ultimo; ?>"></td>
                        <td>
                            <select name="estado" form="<?php echo $ultimo; ?>">
                                <option value="1" selected>Habilitado</option>
                                <option value="0">Deshabilitado</option>
                            </select>
                        </td>
                        <input type="hidden" name="nuevo" value="1" form="<?php echo $ultimo; ?>">
                        <td><input type="submit" value="Crear" form="<?php echo $ultimo; ?>"></td>
                    </tr>
                </table>
            <br>
            <a href="administrar.php"><button>Volver</button></a>
        </div>
        <?php
        }
        else{
            header("location: index.php");
        }
        ?>
    </body>
</html>
