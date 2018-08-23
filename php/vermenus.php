<?php
include("./conexion.php");
$elementos=0;
$sql="SELECT * FROM menus WHERE id_negocio={$_SESSION['id']}";
$consulta=  mysql_query($sql);
while ($registro=  mysql_fetch_array($consulta, MYSQLI_ASSOC)){

    $nombreMenu[$elementos]=$registro['nombre'];
    $descripcionmenu[$elementos]=$registro['descripcion'];
    $fotomenu[$elementos]=$registro['foto'];
    $preciomenu[$elementos]=$registro['precio'];
    $estadomenu[$elementos]=$registro['estado'];
    $idmenu[$elementos]=$registro['id'];
    $elementos++;
}