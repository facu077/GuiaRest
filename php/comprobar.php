<?php
session_start();
include("./conexion.php");

$sql="SELECT * FROM usuarios";
$consulta=  mysql_query($sql);
while ($registro=  mysql_fetch_array($consulta, MYSQLI_ASSOC)){
    if($_POST['usuario']===$registro['nickname']){
        if($_POST['clave']===$registro['password']){
            $ucontrol=true;
            $_SESSION['userid']=$registro['id'];
            $_SESSION['userpass']=$registro['password'];
            $_SESSION['usernombre']=$registro['nombre'];
            $_SESSION['userapellido']=$registro['apellido'];
            $_SESSION['useremail']=$registro['email'];
            $_SESSION['usertelefono']=$registro['telefono'];
            $_SESSION['userdireccion']=$registro['direccion'];
            $_SESSION['userubicacion']=$registro['ubicacion'];
            $_SESSION['menus']=0;
            if($registro['estado']==='0'){
                $deshabilitada=true;
            }
        }
    }
}
if($ucontrol){
    if($deshabilitada){
        header("location: nohabilitado.php");
    }
    else{
    $_SESSION['usuario']="{$_POST['usuario']}";
    $_SESSION['ucontrol']=true;
    header("location: usuario.php");
}}
else{

$sql="SELECT * FROM negocios";
$consulta=  mysql_query($sql);
while ($registro=  mysql_fetch_array($consulta, MYSQLI_ASSOC)){
    if($_POST['usuario']===$registro['nickname']){
        if($_POST['clave']===$registro['password']){
            $ncontrol=true;
            $_SESSION['id']=$registro['id'];
            $_SESSION['usuario']=$registro['nickname'];
            $_SESSION['pass']=$registro['password'];
            $_SESSION['nombre_negocio']=$registro['nombre_negocio'];
            $_SESSION['nombre']=$registro['nombre'];
            $_SESSION['apellido']=$registro['apellido'];
            $_SESSION['email']=$registro['email'];
            $_SESSION['telefono']=$registro['telefono'];
            $_SESSION['direccion']=$registro['direccion'];
            $_SESSION['ubicacion']=$registro['ubicacion'];
            if($registro['estado']==='0'){
                $deshabilitado=true;
            }
            
        }
    }
}

if($ncontrol){
    if($deshabilitado){
        header("location: nohabilitado.php");
    }
    else{
    $_SESSION['ncontrol']=true;
    header("location: negocio.php");
    }
}
else{
    
        $sql="SELECT * FROM administrador";
        $consulta=  mysql_query($sql);
        while ($registro=  mysql_fetch_array($consulta, MYSQLI_ASSOC)){
            if($_POST['usuario']===$registro['usuario']){
                if($_POST['clave']===$registro['clave']){
                    $acontrol=true;
                    $_SESSION['id']=$registro['id'];
                    $_SESSION['usuario']=$registro['usuario'];
                    $_SESSION['pass']=$registro['clave'];
        }
    }
}
    
    if($acontrol){
        $_SESSION['acontrol']=true;
        header("location: administrar.php");
    }
    else{
        session_destroy();
        header("location: incorrecto.html");
}}

}

mysql_close();