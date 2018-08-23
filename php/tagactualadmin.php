<?php
include("./conexion.php");
$neg=0;

$sql="SELECT * FROM negocios";
$consulta=  mysql_query($sql);
while ($registro=  mysql_fetch_array($consulta, MYSQLI_ASSOC)){
    $idneg[$neg]=$registro['id'];
    $neg++;
}

for($n=0;$n<$neg;$n++){
$ntag=0;
$sql="SELECT * FROM tagnegocio WHERE id_negocio={$idneg[$n]}";
$consulta=  mysql_query($sql);
while ($registro=  mysql_fetch_array($consulta, MYSQLI_ASSOC)){
    $idtagneg[$ntag][$n]=$registro['id_tag'];
    $ntag++;
}
}
mysql_close();