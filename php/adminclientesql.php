<?php
include("./conexion.php");

$tabla="usuarios";
$sql="UPDATE $tabla 
    SET nickname='{$_POST['nickname']}',password='{$_POST['clave']}',nombre='{$_POST['nombre']}',apellido='{$_POST['apellido']}',email='{$_POST['email']}',telefono='{$_POST['telefono']}',direccion='{$_POST['direccion']}',ubicacion='{$_POST['ubicacion']}',estado='{$_POST['estado']}'
    WHERE id='{$_POST['id']}'";

mysql_query($sql);

mysql_close();

header("location: admincliente.php");