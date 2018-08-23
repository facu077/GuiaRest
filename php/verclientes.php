<?php
include("./conexion.php");
$elementos=0;
$sql="SELECT * FROM usuarios";
$consulta=  mysql_query($sql);
while ($registro=  mysql_fetch_array($consulta, MYSQLI_ASSOC)){

    $id[$elementos]=$registro['id'];
    $nickname[$elementos]=$registro['nickname'];
    $pass[$elementos]=$registro['password'];
    $nombre[$elementos]=$registro['nombre'];
    $apellido[$elementos]=$registro['apellido'];
    $email[$elementos]=$registro['email'];
    $telefono[$elementos]=$registro['telefono'];
    $direccion[$elementos]=$registro['direccion'];
    $ubicacion[$elementos]=$registro['ubicacion'];
    $estado[$elementos]=$registro['estado'];
    $elementos++;
}