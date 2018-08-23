<?php
session_start();
error_reporting(0);
include("./conexion.php");

if($_POST['boton']==="Confirmar"){

if($_POST['direccion']){
    $direccion=$_POST['direccion'];
}
else{
    $direccion='Retirado en el local';
}

for($n=0;$n<$_SESSION['menus'];$n++){
    $sql="INSERT INTO ventas (id_usuario,id_comida,id_negocio,cantidad,ubicacion,zona,precio,fecha,hora)
        VALUES ('{$_SESSION['userid']}','{$_SESSION['vIdmenu'][$n]}','{$_SESSION['vIdneg'][$n]}','{$_SESSION['vCantidad'][$n]}','$direccion','{$_SESSION['userubicacion']}','{$_SESSION['vPrecio'][$n]}',CURDATE(),CURTIME())";
    $consulta=  mysql_query($sql);
}
mysql_close();

$_SESSION['menus']=0;
header("location: correcto.php");

}

else{
    header("location: usuario.php");
}