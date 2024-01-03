<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST"){

        if (isset($_POST['abone'])){
            $ad = $_POST["name"];
            $email = $_POST["mail"];
            $icerik = $_POST["content"];

            $to = "info@afsuamrd.com.tr";
            $subject = "Site üzerinden yeni bir mesaj var!";
            $message = "Ad: $ad\nE-posta: $email\nİçerik: $icerik";

            $headers = "From: $email" . "\r\n" .
            "Reply-To: $email" . "\r\n" .
            "X-Mailer: PHP/" . phpversion();

            if (empty($email)){
                echo '<script>window.location.href = "./mailnone.html"</script>';
            }
            else{

                if (mail($to, $subject, $message, $headers)) {
                    echo '<script>window.location.href = "./mailsend.html"</script>';
                }
                else{
                    echo '<script>window.location.href = "./index.html"</script>';
                }
            }
        }
    }
    
?>