<?php
session_start();
include("./conexion.php");
$sql="SELECT * FROM menus WHERE id={$_POST['idmenu']}";
$consulta=  mysql_query($sql);
$registro=  mysql_fetch_array($consulta, MYSQLI_ASSOC);

$menus=$_SESSION['menus'];

/* Guardo los datos */

$idneg=$registro['id_negocio'];
$_SESSION['vIdneg'][$menus]=$registro['id_negocio'];
$_SESSION['vIdmenu'][$menus]=$registro['id'];
$_SESSION['vNombre'][$menus]=$registro['nombre'];
$_SESSION['vCantidad'][$menus]=$_POST['cantidad'];
$_SESSION['vPrecio'][$menus]=$registro['precio'];


/* Busco el nombre del negocio */

$sql="SELECT nombre_negocio FROM negocios WHERE id=$idneg";
$consulta=  mysql_query($sql);
$registro=  mysql_fetch_array($consulta, MYSQLI_ASSOC);
$_SESSION['vNegocio'][$menus]=$registro['nombre_negocio'];

mysql_close();

$menus++;
$_SESSION['menus']=$menus;

header("Location: verneg.php?idneg=$idneg");