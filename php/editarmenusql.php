<?php
session_start();
include("./conexion.php");

/* Se almacenan los datos en la DB */

$tabla="menus";
$sql="UPDATE $tabla 
    SET nombre='{$_POST['nombre']}',precio='{$_POST['precio']}',descripcion='{$_POST['descripcion']}'
    WHERE id ='{$_POST['idmenu']}'";

mysql_query($sql);

mysql_close();
/* Se verifica si se subio otra foto */

$nombre = $_POST['fotoubicacion'];
$destino='C:/xampp/htdocs/FinalProgramacion/importados/'.$nombre.'.png';
if(move_uploaded_file($_FILES['foto']['tmp_name'],$destino));

header('Location: negocio.php');