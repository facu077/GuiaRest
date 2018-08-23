<?php
session_start();
include("./conexion.php");

/* Se sube la foto al servidor */

$nombre=  uniqid();
$destino='C:/xampp/htdocs/FinalProgramacion/importados/'.$nombre.'.png';
move_uploaded_file($_FILES['foto']['tmp_name'],$destino);

/* Se verifica el valor de habilitado / deshabilitado */

if($_POST['estado']==='habilitado'){
    $estado=1;
}
else{
    $estado=0;
}

/* Se almacenan los datos en la DB */

$tabla="menus";
$sql="INSERT INTO $tabla (nombre,foto,precio,estado,descripcion,fecha_publicacion,id_negocio)
    VALUES ('{$_POST['nombre']}','$nombre','{$_POST['precio']}','$estado','{$_POST['descripcion']}',CURRENT_TIMESTAMP,'{$_SESSION['id']}')";

mysql_query($sql);

mysql_close();

header('Location: negocio.php');