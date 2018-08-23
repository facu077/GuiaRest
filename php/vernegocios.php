<?php
include("./conexion.php");
$negocios=0;
$sql="SELECT * FROM negocios";
$consulta=  mysql_query($sql);
while ($registro=  mysql_fetch_array($consulta, MYSQLI_ASSOC)){

    $id[$negocios]=$registro['id'];
    $nickname[$negocios]=$registro['nickname'];
    $pass[$negocios]=$registro['password'];
    $negocio[$negocios]=$registro['nombre_negocio'];
    $nombre[$negocios]=$registro['nombre'];
    $apellido[$negocios]=$registro['apellido'];
    $email[$negocios]=$registro['email'];
    $telefono[$negocios]=$registro['telefono'];
    $direccion[$negocios]=$registro['direccion'];
    $ubicacion[$negocios]=$registro['ubicacion'];
    $estado[$negocios]=$registro['estado'];
    $negocios++;
}