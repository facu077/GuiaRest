<?php
session_start();
include("./conexion.php");
error_reporting(0);

/*Se agrega los datos del negocio*/

$tabla="negocios";
$sql="UPDATE $tabla 
    SET nickname='{$_POST['nickname']}',password='{$_POST['clave']}',nombre_negocio='{$_POST['negocio']}',nombre='{$_POST['nombre']}',apellido='{$_POST['apellido']}',email='{$_POST['email']}',telefono='{$_POST['telefono']}',direccion='{$_POST['direccion']}',ubicacion='{$_POST['ubicacion']}',estado='{$_POST['estado']}'
    WHERE id='{$_POST['id']}'";

mysql_query($sql);

/*Se eliminan los tags anteriores*/

$sql="DELETE FROM tagnegocio 
      WHERE id_negocio ='{$_POST['id']}'";

mysql_query($sql);
/*Se crea un array con los ids de los tags seleccionados por el usuario*/

$cont=0;
$comida=$_POST[tags];
$elementos = count($comida);

$sql="select * from tags";
$consulta=  mysql_query($sql);

while ($fila=  mysql_fetch_array($consulta, MYSQLI_ASSOC)){
                
    for($n=0;$n<=$elementos;$n++){
        if($fila['detalle']===$comida[$n]){
            $ids[$cont]=$fila['id'];
            $cont++;
        }
    }
}

/*Se cargan los tags seleccionados en la tabla tags*/

$tabla = "tagNegocio";
for($n=0;$n<$cont;$n++){
    $sql="INSERT INTO $tabla (id_negocio,id_tag)
        VALUES ('{$_POST['id']}','$ids[$n]')";
    mysql_query($sql);
}

mysql_close();

header('Location: adminnegocio.php');
