<?php
include("./conexion.php");

$sql="SELECT * FROM usuarios";
$consulta=  mysql_query($sql);
while ($registro=  mysql_fetch_array($consulta, MYSQLI_ASSOC)){
    if($_POST['usuario']===$registro['nickname']){
        $error=true;
    }
}

$sql="SELECT * FROM negocios";
$consulta=  mysql_query($sql);
while ($registro=  mysql_fetch_array($consulta, MYSQLI_ASSOC)){
    if($_POST['usuario']===$registro['nickname']){
        $error=true;
    }
}

$sql="SELECT * FROM administrador";
$consulta=  mysql_query($sql);
while ($registro=  mysql_fetch_array($consulta, MYSQLI_ASSOC)){
    if($_POST['usuario']===$registro['usuario']){
        $error=true;
    }
}

if($error){
    header("location: error.html");
}
else{

$tabla="usuarios";
$sql="INSERT INTO $tabla (nickname,password,nombre,apellido,email,telefono,direccion,ubicacion)
    VALUES ('{$_POST['usuario']}','{$_POST['pass']}','{$_POST['nombre']}','{$_POST['apellido']}','{$_POST['email']}','{$_POST['telefono']}','{$_POST['direccion']}','{$_POST['ubicacion']}')";

mysql_query($sql);

mysql_close();

header('Location: index.php');
}
