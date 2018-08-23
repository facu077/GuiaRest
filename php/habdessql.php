<?php
include("./conexion.php");

if($_GET['estado']==='1'){
    $nuevoestado='0';
}
else{
    $nuevoestado='1';
}
$tabla="menus";
$sql="UPDATE $tabla 
    SET estado='$nuevoestado'
    WHERE id ='{$_GET['idmenu']}'";

mysql_query($sql);

mysql_close();

header("location: habdes.php");