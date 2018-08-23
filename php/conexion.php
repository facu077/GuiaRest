<?php
$host='127.0.0.7';
$usuario='root';
$clave='4239100';
$baseDatos='guiarest';

$conexion= mysql_connect($host,$usuario,$clave);
mysql_select_db($baseDatos);
?>