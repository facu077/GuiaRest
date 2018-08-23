<?php
session_start();
include("./conexion.php");

/* ventas de las empresas */
if($_POST['valor']==='1'){
    /* Selecciono todos los negocios */
    $elementos=0;
    $sql="SELECT * FROM negocios";
    $consulta=  mysql_query($sql);
    while ($registro=  mysql_fetch_array($consulta, MYSQLI_ASSOC)){
        $ids[$elementos]=$registro['id'];
        $nombres[$elementos]=$registro['nombre_negocio'];
        $elementos++;
    }
    /* Busco la ventas de cada negocio */
    for($cont=0;$cont<$elementos;$cont++){
        $totales[$cont]=0;
        $ventas[$cont]=0;
        $sql="SELECT * FROM ventas WHERE fecha BETWEEN '".$_POST['fecha1']."' AND '".$_POST['fecha2']."' AND id_negocio='".$ids[$cont]."'";
        $consulta=  mysql_query($sql);
        while ($registro=  mysql_fetch_array($consulta, MYSQLI_ASSOC)){
            $totales[$cont]=$totales[$cont]+($registro['cantidad']*$registro['precio']);
            $ventas[$cont]++;
        }
        $venta[]=[$ids[$cont],$nombres[$cont],$totales[$cont],$ventas[$cont]];
    }
    /* Ordeno de mayor a menor */
    foreach ($venta as $key => $row) {
            $aux[$key] = $row[2];
        }
        array_multisort($aux, SORT_DESC, $venta);
    /* Almaceno los datos en variables de SESSION */
    $cont=0;
        foreach ($venta as $key => $row) {
            $_SESSION['idneg'][$cont]=$row['0'];
            $_SESSION['nombreneg'][$cont]=$row['1'];
            $_SESSION['total'][$cont]=$row['2'];
            $_SESSION['ventas'][$cont]=$row['3'];
            $cont++;
        }    
    
    header("location: averreporte.php?valor=1&fecha1=".$_POST['fecha1']."&fecha2=".$_POST['fecha2']."&elementos=$elementos");
}

/* Compra de los usuarios */
if($_POST['valor']==='2'){
    /* Selecciono todos los usuarios */
    $elementos=0;
    $sql="SELECT * FROM usuarios";
    $consulta=  mysql_query($sql);
    while ($registro=  mysql_fetch_array($consulta, MYSQLI_ASSOC)){
        $ids[$elementos]=$registro['id'];
        $nombres[$elementos]=$registro['nombre'];
        $elementos++;
    }
    /* Busco las compras de cada usuario */
    for($cont=0;$cont<$elementos;$cont++){
        $totales[$cont]=0;
        $ventas[$cont]=0;
        $sql="SELECT * FROM ventas WHERE fecha BETWEEN '".$_POST['fecha1']."' AND '".$_POST['fecha2']."' AND id_usuario='".$ids[$cont]."'";
        $consulta=  mysql_query($sql);
        while ($registro=  mysql_fetch_array($consulta, MYSQLI_ASSOC)){
            $totales[$cont]=$totales[$cont]+($registro['cantidad']*$registro['precio']);
            $ventas[$cont]++;
        }
        $venta[]=[$ids[$cont],$nombres[$cont],$totales[$cont],$ventas[$cont]];
    }
    /* Ordeno de mayor a menor */
    foreach ($venta as $key => $row) {
            $aux[$key] = $row[2];
        }
        array_multisort($aux, SORT_DESC, $venta);
    /* Almaceno los datos en variables de SESSION */
    $cont=0;
        foreach ($venta as $key => $row) {
            $_SESSION['idneg'][$cont]=$row['0'];
            $_SESSION['nombreneg'][$cont]=$row['1'];
            $_SESSION['total'][$cont]=$row['2'];
            $_SESSION['ventas'][$cont]=$row['3'];
            $cont++;
        }    
    
    header("location: averreporte.php?valor=2&fecha1=".$_POST['fecha1']."&fecha2=".$_POST['fecha2']."&elementos=$elementos");
}

/* Ventas por tags */
if($_POST['valor']==='3'){
    /* Selecciono todos los tags */
    $elementos=0;
    $sql="SELECT * FROM tags";
    $consulta=  mysql_query($sql);
    while ($registro=  mysql_fetch_array($consulta, MYSQLI_ASSOC)){
        $ids[$elementos]=$registro['id'];
        $nombres[$elementos]=$registro['detalle'];
        $elementos++;
    }
    /* Busco las ventas por tags */
    for($cont=0;$cont<$elementos;$cont++){
        $totales[$cont]=0;
        $ventas[$cont]=0;
        $sql="SELECT * FROM ventas WHERE fecha BETWEEN '".$_POST['fecha1']."' AND '".$_POST['fecha2']."' AND id_comida='".$ids[$cont]."'";
        $consulta=  mysql_query($sql);
        while ($registro=  mysql_fetch_array($consulta, MYSQLI_ASSOC)){
            $totales[$cont]=$totales[$cont]+($registro['cantidad']*$registro['precio']);
            $ventas[$cont]++;
        }
        $venta[]=[$ids[$cont],$nombres[$cont],$totales[$cont],$ventas[$cont]];
    }
    /* Ordeno de mayor a menor */
    foreach ($venta as $key => $row) {
            $aux[$key] = $row[3];
        }
        array_multisort($aux, SORT_DESC, $venta);
    /* Almaceno los datos en variables de SESSION */
    $cont=0;
        foreach ($venta as $key => $row) {
            $_SESSION['idneg'][$cont]=$row['0'];
            $_SESSION['nombreneg'][$cont]=$row['1'];
            $_SESSION['total'][$cont]=$row['2'];
            $_SESSION['ventas'][$cont]=$row['3'];
            $cont++;
        }    
    
    header("location: averreporte.php?valor=3&fecha1=".$_POST['fecha1']."&fecha2=".$_POST['fecha2']."&elementos=$elementos");
}

/* Ventas por zonas */
if($_POST['valor']==='4'){
    /* Selecciono todas las ubicaciones */
    $elementos=0;
    $sql="SELECT * FROM usuarios";
    $consulta=  mysql_query($sql);
    while ($registro=  mysql_fetch_array($consulta, MYSQLI_ASSOC)){
        $nombres[$elementos]=$registro['ubicacion'];
        $elementos++;
    }
    /* Busco las ventas por tags */
    for($cont=0;$cont<$elementos;$cont++){
        $totales[$cont]=0;
        $ventas[$cont]=0;
        $sql="SELECT * FROM ventas WHERE fecha BETWEEN '".$_POST['fecha1']."' AND '".$_POST['fecha2']."' AND zona='".$nombres[$cont]."'";
        $consulta=  mysql_query($sql);
        while ($registro=  mysql_fetch_array($consulta, MYSQLI_ASSOC)){
            $totales[$cont]=$totales[$cont]+($registro['cantidad']*$registro['precio']);
            $ventas[$cont]++;
        }
        $venta[]=[$nombres[$cont],$totales[$cont],$ventas[$cont]];
    }
    /* Ordeno de mayor a menor */
    foreach ($venta as $key => $row) {
            $aux[$key] = $row[2];
        }
        array_multisort($aux, SORT_DESC, $venta);
    /* Almaceno los datos en variables de SESSION */
    $cont=0;
        foreach ($venta as $key => $row) {
            $_SESSION['nombreneg'][$cont]=$row['0'];
            $_SESSION['total'][$cont]=$row['1'];
            $_SESSION['ventas'][$cont]=$row['2'];
            $cont++;
        }    
    
    header("location: averreporte.php?valor=4&fecha1=".$_POST['fecha1']."&fecha2=".$_POST['fecha2']."&elementos=$elementos");
}