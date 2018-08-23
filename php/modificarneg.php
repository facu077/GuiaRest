<?php
session_start();
include ("./vertags.php");
include ("./tagactual.php");
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
        <link rel="stylesheet" href="estilos/general.css">
        <title>GuiaRest</title>
    </head>
    <body class="fondo">
        <?php
        if($_SESSION['ncontrol']){
        ?>
        <div class="baner">
            <span class="titulo">Modificar Datos</span>
        </div>
        <div class="mapa">
            <img src="imagenes/mapa.png">
        </div>
        <div class="imgInfo" title="Se puede seleccionar mas de un tag manteniendo presionado la tecla ctrl">
            <img src="imagenes/info.png">
        </div>
        <form action="modificarnegsql.php" method="POST">
            <div class="nomContraseña">Contraseña</div>
            <div class="txtContraseña"><input type="password" name="pass" size="40" value="<?php echo "{$_SESSION['pass']}" ?>"></div>
            <div class="negNomNegocio">Nombre del Negocio</div>
            <div class="txtNomNegocio"><input type="text" name="nomneg" size="40" value="<?php echo "{$_SESSION['nombre_negocio']}" ?>"></div>
            <div class="negNombre">Nombre</div>
            <div class="txtNegNombre"><input type="text" name="nombre" size="16" value="<?php echo "{$_SESSION['nombre']}" ?>"></div>
            <div class="negApellido">Apellido</div>
            <div class="txtNegApellido"><input type="text" name="apellido" size="16" value="<?php echo "{$_SESSION['apellido']}" ?>"></div>
            <div class="negEmail">Email</div>
            <div class="txtNegEmail"><input type="text" name="email" size="40" value="<?php echo "{$_SESSION['email']}" ?>"></div>
            <div class="negTelefono">Telefono</div>
            <div class="txtNegTelefono"><input type="text" name="telefono" size="40" value="<?php echo "{$_SESSION['telefono']}" ?>"></div>
            <div class="negDireccion">Direccion</div>
            <div class="txtNegDireccion"><input type="text" name="direccion" size="40" value="<?php echo "{$_SESSION['direccion']}" ?>"></div>
            <div class="negUbicacion">Ubicacion en el mapa</div>
            <div class="negTag">Tags</div>
            <div class="tags">
                <select name="tags[]" multiple>
                    <?php 
                    for($cont=0;$cont<$elementos;$cont++){
                        if($estadoTag[$cont]==='1'){
                            for($cont2=0;$cont2<$ntag;$cont2++){
                                if($idtag[$cont]===$idtagneg[$cont2]){
                                    $igual=true;
                                }
                            }
                        if($igual){
                            echo '<option value="'.$nombreTag[$cont].'" selected>'.$nombreTag[$cont].'</option>';
                        }
                        else{
                            echo '<option value="'.$nombreTag[$cont].'">'.$nombreTag[$cont].'</option>';
                        }
                        $igual=false;
                    }}
                    ?>
                </select>
            </div>
            <div class="txtNegUbicacion"><input type="text" name="ubicacion" size="40" value="<?php echo "{$_SESSION['ubicacion']}" ?>"></div>
            <div class="btnNegAceptar"><input type="submit" name="aceptar" value="Guardar"></div>
        </form>
        <form action="negocio.php">
            <div class="btnNegCancelar"><input type="submit" name="cancelar" value="Cancelar"></div>
        </form>
        <?php
        }
        else{
            header("location: index.php");
        }
        ?>
    </body>
</html>
