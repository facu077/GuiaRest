<?php
session_start();
include("./conexion.php");
error_reporting(0);

/*Se agrega los datos del usuario*/

$tabla="usuarios";
$sql="UPDATE $tabla 
    SET password='{$_POST['pass']}',nombre='{$_POST['nombre']}',apellido='{$_POST['apellido']}',email='{$_POST['email']}',telefono='{$_POST['telefono']}',direccion='{$_POST['direccion']}',ubicacion='{$_POST['ubicacion']}'
    WHERE id='{$_SESSION['userid']}'";

mysql_query($sql);

/*Se actualizan los valores de la sesion*/

$_SESSION['userpass']=$_POST['pass'];
$_SESSION['usernombre']=$_POST['nombre'];
$_SESSION['userapellido']=$_POST['apellido'];
$_SESSION['useremail']=$_POST['email'];
$_SESSION['usertelefono']=$_POST['telefono'];
$_SESSION['userdireccion']=$_POST['direccion'];
$_SESSION['userubicacion']=$_POST['ubicacion'];

mysql_close();

header('Location: usuario.php');
