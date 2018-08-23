<?php
include("./conexion.php");

if($_POST['nuevo']==='1'){
    $sql="INSERT INTO tags (detalle,estado) VALUES ('{$_POST['nombre']}','{$_POST['estado']}')";
    mysql_query($sql);
}

else{

$sql="UPDATE tags SET detalle='{$_POST['nombre']}',estado='{$_POST['estado']}' WHERE id='{$_POST['id']}'";
mysql_query($sql);
}
mysql_close();

header("location: admintag.php");