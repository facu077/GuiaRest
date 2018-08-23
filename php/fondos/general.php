<?php
header("content-type: image/png");
$alto=600;
$ancho=800;
$imagen=imagecreate($ancho,$alto);
$violetaoscuro = imagecolorallocate($imagen, 32, 18, 77);
$gris = imagecolorallocate($imagen, 50, 63, 98);
imagefill($imagen,0,0,$violetaoscuro);
imagefilledrectangle($imagen, 1, 1, 800, 92, $gris);
imagefilledrectangle($imagen, 11, 130, 386, 361, $gris);
imagepng($imagen);
?>