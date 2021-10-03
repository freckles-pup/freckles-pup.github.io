<?php
use PHPMailer\PHPMailer\PHPMailer;
require_once 'phpmailer/Exception.php';
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/SMPT.php';

$mail = new PHPMailer(true);

$alert = '';

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    try{
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'dndwebsitedummy@gmail.com';
        $mail->Password = 'd&ddummiesRus';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = '587';


        $mail->setFrom('dndwebsitedummy@gmail.com');
        $mail->addAddress('dndwebsitedummy@gmail.com');
        $mail->isHTML(true);
        $mail->Subject = 'Message Received (Contact Page)';
        $mail->Body = "<h3>Name: $name <br>Email: $email<br>Message: $message</h3>";


        $mail->send();
        $alert = '<div class="alertsuccess">
                    <span>Message Sent! Thank you for contacting us.</span>
                    </div>';
    } catch(Exception $e){
            $alert = '<div class="alerterror">
                        <span>'.$e->getMessage().'</span>
                        </div>';
        }
    
}