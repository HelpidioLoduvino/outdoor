<?php

// Importar a classe PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require '../lib/vendor/autoload.php';
// Criar uma nova instância do PHPMailer
$mail = new PHPMailer(true);

try {
    // Configurações do servidor SMTP do Gmail
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = '20201608.helpidio@gmail.com';
    $mail->Password = '20201608caldeira';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 465;

    // Configurações do email
    $mail->setFrom('20201608.helpidio@gmail.com', 'Helpidio Mateus');
    $mail->addAddress('helpidiolafame@gmail.com', 'Helpidio');
    $mail->Subject = 'Testando o envio de email com o PHPMailer';
    $mail->Body = 'Olá, isso é um teste de envio de email usando o PHPMailer.';

    // Enviar o email
    $mail->send();
    echo 'Email enviado com sucesso.';
} catch (Exception $e) {
    echo 'Erro ao enviar o email: ' . $mail->ErrorInfo;
}

