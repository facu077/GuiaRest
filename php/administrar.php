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
        <div class="subtitulo">Seleccione una opcion</div>
        <div class="formulario">
            <a href="admintag.php"><button>Administrar Tags</button></a><br><br>
            <a href="admincliente.php"><button>Administrar Clientes</button></a><br><br>
            <a href="adminnegocio.php"><button>Administrar Negocios</button></a><br><br>
            <a href="adminreportes.php"><button>Reportes</button></a>
        </div>
        <?php
        }
        else{
            header("location: index.php");
        }
        ?>
    </body>
</html>
