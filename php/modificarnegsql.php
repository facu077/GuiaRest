<?php
session_start();
include("./conexion.php");
error_reporting(0);

/*Se agrega los datos del negocio*/

$tabla="negocios";
$sql="UPDATE $tabla 
    SET password='{$_POST['pass']}',nombre_negocio='{$_POST['nomneg']}',nombre='{$_POST['nombre']}',apellido='{$_POST['apellido']}',email='{$_POST['email']}',telefono='{$_POST['telefono']}',direccion='{$_POST['direccion']}',ubicacion='{$_POST['ubicacion']}'
    WHERE id='{$_SESSION['id']}'";

mysql_query($sql);

/*Se eliminan los tags anteriores*/

$sql="DELETE FROM tagnegocio 
      WHERE id_negocio ='{$_SESSION['id']}'";

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
        VALUES ('{$_SESSION['id']}','$ids[$n]')";
    mysql_query($sql);
}

mysql_close();

/*Se actualizan los valores de la sesion*/

$_SESSION['pass']=$_POST['pass'];
$_SESSION['nombre_negocio']=$_POST['nomneg'];
$_SESSION['nombre']=$_POST['nombre'];
$_SESSION['apellido']=$_POST['apellido'];
$_SESSION['email']=$_POST['email'];
$_SESSION['telefono']=$_POST['telefono'];
$_SESSION['direccion']=$_POST['direccion'];
$_SESSION['ubicacion']=$_POST['ubicacion'];

header('Location: negocio.php');
