<?php
session_start();
error_reporting(0);
include("./conexion.php");
$n=0;
if($_POST['valor']==='1'){
    $sql='SELECT * FROM ventas WHERE fecha BETWEEN "'.$_POST['fecha1'].'" AND "'.$_POST['fecha2'].'" AND id_negocio ="'.$_SESSION['id'].'"';
    $consulta=  mysql_query($sql);
    while ($registro=  mysql_fetch_array($consulta, MYSQLI_ASSOC)){
                $idmenu[$n]=$registro['id_comida'];
                $_SESSION['cantidad'][$n]=$registro['cantidad'];
                $precio=$registro['precio'];
                $_SESSION['totalmenu'][$n]=$precio*$_SESSION['cantidad'][$n];
                $n++;
    }


/* Busco el nombre del menu y veo su estado */

for($cont=0;$cont<$n;$cont++){
    $sql = "Select * FROM menus WHERE id = '".$idmenu[$cont]."'";
    $consulta=  mysql_query($sql);
    $registro=  mysql_fetch_array($consulta, MYSQLI_ASSOC);
    $_SESSION['nombremenu'][$cont]=$registro['nombre'];
    $_SESSION['estadomenu'][$cont]=$registro['estado'];
}


header("location: verreporte.php?valor=1&fecha1=".$_POST['fecha1']."&fecha2=".$_POST['fecha2']."&elementos=$n");
}

if($_POST['valor']==='2'){
    for($cont=0;$cont<6;$cont++){
        $ventas[$cont][0]=0;
        $ventas[$cont][1]=0;
    }
    $sql='SELECT * FROM ventas WHERE fecha BETWEEN "'.$_POST['fecha1'].'" AND "'.$_POST['fecha2'].'" AND id_negocio ="'.$_SESSION['id'].'"';
    $consulta=  mysql_query($sql);
    while ($registro=  mysql_fetch_array($consulta, MYSQLI_ASSOC)){
        $hora=$registro['hora'];
        $hora = array_shift(explode(':', $hora));

                switch ($hora) {
                    
                    case '00':
                        $venta[0]++;
                        break;
                    case '01':
                        $venta[1]++;
                        break;
                    case '02':
                        $venta[2]++;
                        break;
                    case '03':
                        $venta[3]++;
                        break;
                    case '04':
                        $venta[4]++;
                        break;
                    case '05':
                        $venta[5]++;
                        break;
                    case '06':
                        $venta[6]++;
                        break;
                    case '07':
                        $venta[7]++;
                        break;
                    case '08':
                        $venta[8]++;
                        break;
                    case '09':
                        $venta[9]++;
                        break;
                    case '10':
                        $venta[10]++;
                        break;
                    case '11':
                        $venta[11]++;
                        break;
                    case '12':
                        $venta[12]++;
                        break;
                    case '13':
                        $venta[13]++;
                        break;
                    case '14':
                        $venta[14]++;
                        break;
                    case '15':
                        $venta[15]++;
                        break;
                    case '16':
                        $venta[16]++;
                        break;
                    case '17':
                        $venta[17]++;
                        break;
                    case '18':
                        $venta[18]++;
                        break;
                    case '19':
                        $venta[19]++;
                        break;
                    case '20':
                        $venta[20]++;
                        break;
                    case '21':
                        $venta[21]++;
                        break;
                    case '22':
                        $venta[22]++;
                        break;
                    case '23':
                        $venta[23]++;
                        break;
                }
    }

arsort($venta);
while(count($venta)> 6){
    array_pop($venta);
}
for($n=0;$n<24;$n++){
    if($venta[$n]){
        $ventas[]=[$n,$venta[$n]];
    }
}

foreach ($ventas as $key => $row) {
    $aux[$key] = $row[1];
    }
array_multisort($aux, SORT_DESC, $ventas);

$_SESSION['ventas']=$ventas;
header("location: verreporte.php?valor=2&fecha1=".$_POST['fecha1']."&fecha2=".$_POST['fecha2']);
}

if($_POST['valor']==='3'){
    for($cont=0;$cont<6;$cont++){
        $ventas[$cont][0]=0;
        $ventas[$cont][1]=0;
    }
    $sql='SELECT * FROM ventas WHERE id_negocio ="'.$_SESSION['id'].'"';
    $consulta=  mysql_query($sql);
    while ($registro=  mysql_fetch_array($consulta, MYSQLI_ASSOC)){
        $zona=$registro['zona'];

                switch ($zona) {
                    
case 'a0':
$venta['a0']++;
break;
case 'a1':
$venta['a1']++;
break;
case 'a2':
$venta['a2']++;
break;
case 'a3':
$venta['a3']++;
break;
case 'a4':
$venta['a4']++;
break;
case 'a5':
$venta['a5']++;
break;
case 'a6':
$venta['a6']++;
break;
case 'a7':
$venta['a7']++;
break;
case 'a8':
$venta['a8']++;
break;
case 'a9':
$venta['a9']++;
break;
case 'b0':
$venta['b0']++;
break;
case 'b1':
$venta['b1']++;
break;
case 'b2':
$venta['b2']++;
break;
case 'b3':
$venta['b3']++;
break;
case 'b4':
$venta['b4']++;
break;
case 'b5':
$venta['b5']++;
break;
case 'b6':
$venta['b6']++;
break;
case 'b7':
$venta['b7']++;
break;
case 'b8':
$venta['b8']++;
break;
case 'b9':
$venta['b9']++;
break;
case 'c0':
$venta['c0']++;
break;
case 'c1':
$venta['c1']++;
break;
case 'c2':
$venta['c2']++;
break;
case 'c3':
$venta['c3']++;
break;
case 'c4':
$venta['c4']++;
break;
case 'c5':
$venta['c5']++;
break;
case 'c6':
$venta['c6']++;
break;
case 'c7':
$venta['c7']++;
break;
case 'c8':
$venta['c8']++;
break;
case 'c9':
$venta['c9']++;
break;
case 'd0':
$venta['d0']++;
break;
case 'd1':
$venta['d1']++;
break;
case 'd2':
$venta['d2']++;
break;
case 'd3':
$venta['d3']++;
break;
case 'd4':
$venta['d4']++;
break;
case 'd5':
$venta['d5']++;
break;
case 'd6':
$venta['d6']++;
break;
case 'd7':
$venta['d7']++;
break;
case 'd8':
$venta['d8']++;
break;
case 'd9':
$venta['d9']++;
break;
case 'e0':
$venta['e0']++;
break;
case 'e1':
$venta['e1']++;
break;
case 'e2':
$venta['e2']++;
break;
case 'e3':
$venta['e3']++;
break;
case 'e4':
$venta['e4']++;
break;
case 'e5':
$venta['e5']++;
break;
case 'e6':
$venta['e6']++;
break;
case 'e7':
$venta['e7']++;
break;
case 'e8':
$venta['e8']++;
break;
case 'e9':
$venta['e9']++;
break;
case 'f0':
$venta['f0']++;
break;
case 'f1':
$venta['f1']++;
break;
case 'f2':
$venta['f2']++;
break;
case 'f3':
$venta['f3']++;
break;
case 'f4':
$venta['f4']++;
break;
case 'f5':
$venta['f5']++;
break;
case 'f6':
$venta['f6']++;
break;
case 'f7':
$venta['f7']++;
break;
case 'f8':
$venta['f8']++;
break;
case 'f9':
$venta['f9']++;
break;
case 'g0':
$venta['g0']++;
break;
case 'g1':
$venta['g1']++;
break;
case 'g2':
$venta['g2']++;
break;
case 'g3':
$venta['g3']++;
break;
case 'g4':
$venta['g4']++;
break;
case 'g5':
$venta['g5']++;
break;
case 'g6':
$venta['g6']++;
break;
case 'g7':
$venta['g7']++;
break;
case 'g8':
$venta['g8']++;
break;
case 'g9':
$venta['g9']++;
break;
case 'h0':
$venta['h0']++;
break;
case 'h1':
$venta['h1']++;
break;
case 'h2':
$venta['h2']++;
break;
case 'h3':
$venta['h3']++;
break;
case 'h4':
$venta['h4']++;
break;
case 'h5':
$venta['h5']++;
break;
case 'h6':
$venta['h6']++;
break;
case 'h7':
$venta['h7']++;
break;
case 'h8':
$venta['h8']++;
break;
case 'h9':
$venta['h9']++;
break;
case 'i0':
$venta['i0']++;
break;
case 'i1':
$venta['i1']++;
break;
case 'i2':
$venta['i2']++;
break;
case 'i3':
$venta['i3']++;
break;
case 'i4':
$venta['i4']++;
break;
case 'i5':
$venta['i5']++;
break;
case 'i6':
$venta['i6']++;
break;
case 'i7':
$venta['i7']++;
break;
case 'i8':
$venta['i8']++;
break;
case 'i9':
$venta['i9']++;
break;
case 'j0':
$venta['j0']++;
break;
case 'j1':
$venta['j1']++;
break;
case 'j2':
$venta['j2']++;
break;
case 'j3':
$venta['j3']++;
break;
case 'j4':
$venta['j4']++;
break;
case 'j5':
$venta['j5']++;
break;
case 'j6':
$venta['j6']++;
break;
case 'j7':
$venta['j7']++;
break;
case 'j8':
$venta['j8']++;
break;
case 'j9':
$venta['j9']++;
break;
case 'k0':
$venta['k0']++;
break;
case 'k1':
$venta['k1']++;
break;
case 'k2':
$venta['k2']++;
break;
case 'k3':
$venta['k3']++;
break;
case 'k4':
$venta['k4']++;
break;
case 'k5':
$venta['k5']++;
break;
case 'k6':
$venta['k6']++;
break;
case 'k7':
$venta['k7']++;
break;
case 'k8':
$venta['k8']++;
break;
case 'k9':
$venta['k9']++;
break;
case 'l0':
$venta['l0']++;
break;
case 'l1':
$venta['l1']++;
break;
case 'l2':
$venta['l2']++;
break;
case 'l3':
$venta['l3']++;
break;
case 'l4':
$venta['l4']++;
break;
case 'l5':
$venta['l5']++;
break;
case 'l6':
$venta['l6']++;
break;
case 'l7':
$venta['l7']++;
break;
case 'l8':
$venta['l8']++;
break;
case 'l9':
$venta['l9']++;
break;
                }
    }

arsort($venta);
while(count($venta)> 6){
    array_pop($venta);
}

while($element = current($venta)) {

    $posicion = key($venta);
    $ventas[]=[$posicion,$venta[$posicion]];
    next($venta);
}

foreach ($ventas as $key => $row) {
    $aux[$key] = $row[1];
    }
array_multisort($aux, SORT_DESC, $ventas);

$_SESSION['ventas']=$ventas;
header("location: verreporte.php?valor=3");

}

mysql_close();