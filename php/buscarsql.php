<?php
session_start();
include("./conexion.php");

$_SESSION['nada']=false;
$control=true;

if($_POST['nombreneg']){
    $sql="SELECT * FROM negocios WHERE nombre_negocio='".$_POST['nombreneg']."'";
    $consulta=  mysql_query($sql);
    $registro=  mysql_fetch_array($consulta, MYSQLI_ASSOC);
    $_SESSION['negnombre0']=$registro['nombre_negocio'];
    $_SESSION['idnegocio0']=$registro['id'];
    $_SESSION['cantneg']=1;
    $control=false;
}

if($_POST['direccion']){
    $sql="SELECT * FROM negocios WHERE direccion='".$_POST['direccion']."'";
    $consulta=  mysql_query($sql);
    $registro=  mysql_fetch_array($consulta, MYSQLI_ASSOC);
    $_SESSION['negnombre0']=$registro['nombre_negocio'];
    $_SESSION['idnegocio0']=$registro['id'];
    $_SESSION['cantneg']=1;
    $control=false;
}

if($_POST['email']){
    $sql="SELECT * FROM negocios WHERE email='".$_POST['email']."'";
    $consulta=  mysql_query($sql);
    $registro=  mysql_fetch_array($consulta, MYSQLI_ASSOC);
    $_SESSION['negnombre0']=$registro['nombre_negocio'];
    $_SESSION['idnegocio0']=$registro['id'];
    $_SESSION['cantneg']=1;
    $control=false;
}

if($_POST['telefono']){
    $sql="SELECT * FROM negocios WHERE telefono='".$_POST['telefono']."'";
    $consulta=  mysql_query($sql);
    $registro=  mysql_fetch_array($consulta, MYSQLI_ASSOC);
    $_SESSION['negnombre0']=$registro['nombre_negocio'];
    $_SESSION['idnegocio0']=$registro['id'];
    $_SESSION['cantneg']=1;
    $control=false;
}

if($control){
    if($_POST['tags']!='na'){
        /* Paso a coordenadas la ubicacion del usuario */
        $miubicacion=  str_split($_SESSION['userubicacion']);
        $x1=$miubicacion[1];
        $y1=ord("$miubicacion[0]")-96;
        /**/
        $n=0;
        $sql="SELECT * FROM tagnegocio WHERE id_tag='".$_POST['tags']."'";
        $consulta=  mysql_query($sql);
        while ($registro=  mysql_fetch_array($consulta, MYSQLI_ASSOC)){
            $idnegocio[$n]=$registro['id_negocio'];
            $n++;
        }
        $_SESSION['cantneg']=$n;
        for($cont=0;$cont<$n;$cont++){
            $sql="SELECT * FROM negocios WHERE id='".$idnegocio[$cont]."'";
            $consulta=  mysql_query($sql);
            $registro=  mysql_fetch_array($consulta, MYSQLI_ASSOC);
            $nombre=$registro['nombre_negocio'];
            $id=$registro['id'];
            $ubicacion=$registro['ubicacion'];
            
            /* Paso a coordenadas la ubicacion del negocio y calculo la distancia */
            $ubicacion = str_split($ubicacion);
            $x2=$ubicacion[1];
            $y2=ord("$ubicacion[0]")-96;
            
            $distancia= sqrt(pow($x2-$x1,2)+pow($y2-$y1,2));
            
            $negocio[]=[$nombre,$id,$distancia];
        }
        /* Ordeno al arreglo negocio en base a la distancia */
        foreach ($negocio as $key => $row) {
            $aux[$key] = $row[2];
        }
        array_multisort($aux, SORT_ASC, $negocio);
        /* Almaceno los datos en una variable de SESSION */
        $cont=0;
        foreach ($negocio as $key => $row) {
            $_SESSION['negnombre'.$cont]=$row['0'];
            $_SESSION['idnegocio'.$cont]=$row['1'];
            $cont++;
        }
    }
    else{
        $_SESSION['nada']=true;
    }
    
}

mysql_close();

header("location: buscar.php");