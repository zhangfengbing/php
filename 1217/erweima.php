<?php
header("content-type:text/html;charset=utf-8");
include("phpqrcode/phpqrcode.php");
$errorLevel="L";
$size="5";
$url="http://www.baidu.com/";
$url.="\r\n";

//调用QRcode的一个类
QRcode::png($url,"2dcode.png",$errorLevel,$size,2);

$QR="2dcode.png";
$logo="logo.png";
//
$QR=imagecreatefromstring(file_get_contents($QR));
$logo=imagecreatefromstring(file_get_contents($logo));


$QR_width=imagesX($QR);
$QR_height=imagesY($QR);
$logo_width=imagesX($logo);
$logo_height=imagesY($logo);


$logo_qr_width=$QR_width/5;
$scale=$logo_width/$logo_qr_width;
$logo_qr_height=$logo_height/$scale;

$from_width=($QR_width-$logo_qr_height)/2;

imagecopyresampled($QR, $logo, $from_width,$from_width,0, 0, $logo_qr_width, $logo_qr_height, $logo_width, $logo_height);

imagepng($QR,"baidu.png");
echo "<img src='baidu.png'/>";

?>