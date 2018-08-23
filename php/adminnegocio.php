<?php
session_start();
include("./vernegocios.php");
include("./vertags.php");
include ("./tagactualadmin.php");
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
        <div class="infomenu">Administrar Clientes</div>
        <div class="editarmenus">
            <?php 
            for($cont=0;$cont<$negocios;$cont++){
            echo '<form action="adminnegociosql.php" method="POST" id='.$cont.'></form>';
            }
            ?>
                <table border="1">
                    <tr>
                        <td>ID</td>
                        <td>Nickname</td>
                        <td>Clave</td>
                        <td>Negocio</td>
                        <td>Nombre</td>
                        <td>Apellido</td>
                        <td>Email</td>
                        <td>Telefono</td>
                        <td>Direccion</td>
                        <td>Ubicacion</td>
                        <td>Tags</td>
                        <td>Estado</td>
                        <td></td>
                    </tr>
                    <?php for($cont=0;$cont<$negocios;$cont++){ ?>
                    <tr>
                        <td><?php echo $id[$cont]; ?></td>
                        <td><input type="text" name="nickname" size="10" value="<?php echo $nickname[$cont]; ?>" form="<?php echo $cont; ?>"></td>
                        <td><input type="text" name="clave" size="10" value="<?php echo $pass[$cont]; ?>" form="<?php echo $cont; ?>"></td>
                        <td><input type="text" name="negocio" size="10" value="<?php echo $negocio[$cont]; ?>" form="<?php echo $cont; ?>"></td>
                        <td><input type="text" name="nombre" size="10" value="<?php echo $nombre[$cont]; ?>" form="<?php echo $cont; ?>"></td>
                        <td><input type="text" name="apellido" size="10" value="<?php echo $apellido[$cont]; ?>" form="<?php echo $cont; ?>"></td>
                        <td><input type="text" name="email" size="15" value="<?php echo $email[$cont]; ?>" form="<?php echo $cont; ?>"></td>
                        <td><input type="text" name="telefono" size="10" value="<?php echo $telefono[$cont]; ?>" form="<?php echo $cont; ?>"></td>
                        <td><input type="text" name="direccion" size="13" value="<?php echo $direccion[$cont]; ?>" form="<?php echo $cont; ?>"></td>
                        <td><input type="text" name="ubicacion" size="5" value="<?php echo $ubicacion[$cont]; ?>" form="<?php echo $cont; ?>"></td>
                        <td>
                            <select name="tags[]" multiple size="2" form="<?php echo $cont; ?>">
                                <?php 
                                for($cont3=0;$cont3<$elementos;$cont3++){
                                    if($estadoTag[$cont3]==='1'){
                                        for($cont2=0;$cont2<$ntag;$cont2++){
                                            if($idtag[$cont3]===$idtagneg[$cont2][$cont]){
                                                $igual=true;
                                            }
                                        }
                                    if($igual){
                                        echo '<option value="'.$nombreTag[$cont3].'" selected>'.$nombreTag[$cont3].'</option>';
                                    }
                                    else{
                                        echo '<option value="'.$nombreTag[$cont3].'">'.$nombreTag[$cont3].'</option>';
                                    }
                                    $igual=false;
                                }}
                                ?>
                            </select>
                        </td>
                        <td>
                            <select name="estado" form="<?php echo $cont; ?>">
                                <?php if($estado[$cont]==='1'){ ?>
                                <option value="1" selected>Habilitado</option>
                                <option value="0">Deshabilitado</option>
                                <?php } else{?>
                                <option value="1">Habilitado</option>
                                <option value="0" selected>Deshabilitado</option>
                                <?php } ?>
                            </select>
                        </td>
                        <input type="hidden" name="id" value="<?php echo $id[$cont]; ?>" form="<?php echo $cont; ?>">
                        <td><input type="submit" value="Modificar" form="<?php echo $cont; ?>"></td>
                    </tr>
                    <?php } ?>
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
