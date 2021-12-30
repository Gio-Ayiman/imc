<?php include("connex.php");

    $mail = $_GET['mail'];

    if(isset($mail) && !($mail == '')){
        $to      = $mail;
        $subject = 'Message de prescription';
        $message = 'Vous etes trop gros. Vous devriez vous mettre au sport et faire un regime alimentaire';
        $message = wordwrap($message, 70, "\r\n");
        $headers = 'From: giovanniayimambenwe@yahoo.com';
        
        mail($to, $subject, $message, $headers);

    }


