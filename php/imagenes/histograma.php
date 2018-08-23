<?php
session_start();
header("content-type: image/png");
$ventas=$_SESSION['ventas'];
/* Creo el fondo y los colores */
$imagen=imagecreate(800,400);
$azul = imagecolorallocate($imagen, 22, 56, 169);
$verde = imagecolorallocate($imagen, 0, 200, 0);
$blanco = imagecolorallocate($imagen, 255, 255, 255);
imagefill($imagen,1,1,$azul);
/* Dibujo las barras */
ImageFilledRectangle($imagen, 25, 25, 775, 375, $blanco);
for($n=0;$n<6;$n++){
    if($ventas[$n][1]>70){
        $ventas[$n][1]=70;
}}
ImageFilledRectangle($imagen, 45, 375-$ventas[0][1]*5, 146, 375, $verde);
imagestring($imagen, 5, 50, 385, "{$ventas[0][0]} hrs", $blanco);
ImageFilledRectangle($imagen, 166, 375-$ventas[1][1]*5, 267, 375, $verde);
imagestring($imagen, 5, 171, 385, "{$ventas[1][0]} hrs", $blanco);
ImageFilledRectangle($imagen, 287, 375-$ventas[2][1]*5, 388, 375, $verde);
imagestring($imagen, 5, 292, 385, "{$ventas[2][0]} hrs", $blanco);
ImageFilledRectangle($imagen, 408, 375-$ventas[3][1]*5, 509, 375, $verde);
imagestring($imagen, 5, 413, 385, "{$ventas[3][0]} hrs", $blanco);
ImageFilledRectangle($imagen, 529, 375-$ventas[4][1]*5, 630, 375, $verde);
imagestring($imagen, 5, 534, 385, "{$ventas[4][0]} hrs", $blanco);
ImageFilledRectangle($imagen, 650, 375-$ventas[5][1]*5, 751, 375, $verde);
imagestring($imagen, 5, 655, 385, "{$ventas[5][0]} hrs", $blanco);
imagestring($imagen, 5, 2, 375-5*5, "5", $blanco);
imagestring($imagen, 5, 2, 375-10*5, "10", $blanco);
imagestring($imagen, 5, 2, 375-15*5, "15", $blanco);
imagestring($imagen, 5, 2, 375-20*5, "20", $blanco);
imagestring($imagen, 5, 2, 375-25*5, "25", $blanco);
imagestring($imagen, 5, 2, 375-30*5, "30", $blanco);
imagestring($imagen, 5, 2, 375-35*5, "35", $blanco);
imagestring($imagen, 5, 2, 375-40*5, "40", $blanco);
imagestring($imagen, 5, 2, 375-45*5, "45", $blanco);
imagestring($imagen, 5, 2, 375-50*5, "50", $blanco);
imagestring($imagen, 5, 2, 375-55*5, "55", $blanco);
imagestring($imagen, 5, 2, 375-60*5, "60", $blanco);
imagestring($imagen, 5, 2, 375-65*5, "65", $blanco);
imagestring($imagen, 5, 2, 375-70*5, "70+", $blanco);

imagepng($imagen);
