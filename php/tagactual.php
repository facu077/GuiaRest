<?php
include("./conexion.php");
$ntag=0;
$sql="SELECT * FROM tagnegocio WHERE id_negocio={$_SESSION['id']}";
$consulta=  mysql_query($sql);
while ($registro=  mysql_fetch_array($consulta, MYSQLI_ASSOC)){
    $idtagneg[$ntag]=$registro['id_tag'];
    $ntag++;
}
