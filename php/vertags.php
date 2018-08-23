<?php
include("./conexion.php");
$elementos=0;
$sql="SELECT * FROM tags";
$consulta=  mysql_query($sql);
while ($registro=  mysql_fetch_array($consulta, MYSQLI_ASSOC)){

    $nombreTag[$elementos]=$registro['detalle'];
    $idtag[$elementos]=$registro['id'];
    $estadoTag[$elementos]=$registro['estado'];
    $elementos++;
}