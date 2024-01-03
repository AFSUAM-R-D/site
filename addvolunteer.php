<?php 
session_start();
include("baglanti.php");

$isim = $_POST["adsoyad"];
$phone = $_POST["phone"];
$email = $_POST["email"];
$bolum = $_POST["bolum"];
$sinif = $_POST["sinif"];
$secilenDiller = $_POST['diller'];
$ayriDil = $_POST['software'];
$projeGörevleri = $_POST['projects'];
$projeGörevleri = mb_convert_encoding($projeGörevleri, 'ASCII', 'UTF-8');
$labsaati = $_POST["saat"];
$labsaati = mb_convert_encoding($labsaati, 'ASCII', 'UTF-8');
$secilenTakim = $_POST['takim'];
$beklenti = $_POST["beklenti"];
$beklenti = mb_convert_encoding($beklenti, 'ASCII', 'UTF-8');

$sel = "SELECT * FROM uyeler WHERE isim = '$name' OR telefon = '$phone'";
$result = mysqli_query($db, $sel);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$count = mysqli_num_rows($result);

if($count > 0){
    
    echo 
    "<script> alert('Halihazırda bir üyelik başvurunuz mevcut. Ekibimiz yakın zamanda sizinle iletişime geçecektir.'); window.location.replace('https://afsuamrd.com.tr/bizekatil.html');</script>";
}
else{
    
    $sql = "INSERT INTO uyeler (isim, mail, telefon, bolum, sinif, yazilimdili, ayridil, projegorevleri, labsaati, takim, beklentileri) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("sssssssssss", $name, $email, $phone, $bolum, $sinif, $secilenDiller, $ayriDil, $projeGörevleri, $labsaati, $secilenTakim, $beklenti);
    $stmt->execute();
    
    if ($stmt) {
        echo
        "<script> alert('Üyelik kaydı başarıyla tamamlandı. Teşekkür ederiz.'); window.location.replace('https://afsuamrd.com.tr'); </script>";
    }
}

?>