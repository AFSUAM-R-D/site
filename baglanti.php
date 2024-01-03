<?php

ini_set('display_errors', 'on');

/* 
Veritabani baglantimizi yapiyoruz
*/

$hostadresi        =	"localhost";
$kullaniciadi      =	"afs48mrdcomtr_main";
$sifre             =	"afsuammain_123";
$veritabani        =	"afs48mrdcomtr_gonullu";

$db = mysqli_connect($hostadresi,$kullaniciadi,$sifre,$veritabani);
if (mysqli_connect_errno())
{
echo "MySQL baglantisi basarisiz: " . mysqli_connect_error();
}
?>
