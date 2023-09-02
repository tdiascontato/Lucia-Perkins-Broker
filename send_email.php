<?php
require 'config/database.php';
//apagar se na hospedagem não for. Deixar somente whats
    if(isset($_POST['submit'])){
        $email_send = $_POST["email_send"];
        $to = "tdiascontato@gmail.com";
        $subject = "Contato pelo formulário";
        $message = "E-mail ou telefone: " . $email_send;
        $headers = "From: corretor@name.com";
        $sendemail = mail($to, $subject, $message, $headers);
    if($sendemail) {
        /*E-mail enviado com sucesso!*/
        header('location: ' . ROOT_URL);
        die();
    } else {
        /*E-mail não foi enviado com sucesso!*/
        header('location: ' . ROOT_URL . 'contact.php');
        die();
    }
}
?>