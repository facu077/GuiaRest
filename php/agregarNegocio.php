<?php
include("./conexion.php");
error_reporting(0);

/* Verifico que el nombre de usuario no este registrado */

$sql="SELECT * FROM usuarios";
$consulta=  mysql_query($sql);
while ($registro=  mysql_fetch_array($consulta, MYSQLI_ASSOC)){
    if($_POST['usuario']===$registro['nickname']){
        $error=true;
    }
}

$sql="SELECT * FROM negocios";
$consulta=  mysql_query($sql);
while ($registro=  mysql_fetch_array($consulta, MYSQLI_ASSOC)){
    if($_POST['usuario']===$registro['nickname']){
        $error=true;
    }
}

$sql="SELECT * FROM administrador";
$consulta=  mysql_query($sql);
while ($registro=  mysql_fetch_array($consulta, MYSQLI_ASSOC)){
    if($_POST['usuario']===$registro['usuario']){
        $error=true;
    }
}

if($error){
    header("location: error.html");
}

else{

/*Se agrega los datos del negocio*/

$tabla="negocios";
$sql="INSERT INTO $tabla (nickname,password,nombre_negocio,nombre,apellido,email,telefono,direccion,ubicacion)
    VALUES ('{$_POST['usuario']}','{$_POST['pass']}','{$_POST['nomneg']}','{$_POST['nombre']}','{$_POST['apellido']}','{$_POST['email']}','{$_POST['telefono']}','{$_POST['direccion']}','{$_POST['ubicacion']}')";

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

/*Se busca el id del negocio*/

$sql="select id from negocios where nickname = '{$_POST['usuario']}'";
$consulta=  mysql_query($sql);

$row = mysql_fetch_array($consulta);
$id_usuario=$row['id'];

/*Se cargan los tags seleccionados en la tabla tags*/

$tabla = "tagNegocio";
for($n=0;$n<$cont;$n++){
    $sql="INSERT INTO $tabla (id_negocio,id_tag)
        VALUES ('$id_usuario','$ids[$n]')";
    mysql_query($sql);
}

mysql_close();

header('Location: index.php');
}