<?php
session_start();

if($_GET['todo']){
    unset($_SESSION['vNombre']);
    unset($_SESSION['vCantidad']);
    unset($_SESSION['vPrecio']);
    unset($_SESSION['vNegocio']);
    
    $_SESSION['menus']=0;
}

else{

$menus=$_GET['menu'];
unset($_SESSION['vNombre'][$menus]);
unset($_SESSION['vCantidad'][$menus]);
unset($_SESSION['vPrecio'][$menus]);
unset($_SESSION['vNegocio'][$menus]);

$_SESSION['vNombre'] =  array_values($_SESSION['vNombre']);
$_SESSION['vCantidad'] =  array_values($_SESSION['vCantidad']);
$_SESSION['vPrecio'] =  array_values($_SESSION['vPrecio']);
$_SESSION['vNegocio'] =  array_values($_SESSION['vNegocio']);

$_SESSION['menus']--;

}

header("location: carrito.php");