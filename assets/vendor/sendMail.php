<?php
    //Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// //Load Composer's autoloader
// require  $_SERVER['DOCUMENT_ROOT'].'/projects/afyapro/email/phpmailer/PHPMailerAutoload.php';
require  '../../email/phpmailer/PHPMailerAutoload.php';
if(isset($_POST['submit'])){
    $name = $_POST['name'];
	$email = $_POST['email'];
    $phone = $_POST['phone'];
    $company = $_POST['company'];
    $date = $_POST['date'];
    $department = $_POST['department'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $body = '<b>Name: </b> '.$name.'<br><b>Email: </b>' .$email.'<br><b>Phone: </b>' .$phone;
    $body .= '<b><br>Company: </b> '.$company.'<br><b>Date: </b>' .$date.'<br><b>Solution: </b>' .$department.'<br><b>Message: </b>' .$message;
require_once '../../src/PHPMailer.php';
require_once  '../../src/SMTP.php';
require_once  '../../src/Exception.php';    

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = false;      
    $mail->do_debug = 0;                //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'goodam198@gmail.com';                     //SMTP username
    $mail->Password   = 'goodluckdaniel1998';                               //SMTP password
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom($email, $name);
    $mail->addAddress('rachel.mshomi@afyapro.net', 'AfyaPro');     //Add a recipient           //Name is optional
    $mail->addReplyTo($email, $name);

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $body;

    $mail->send();
    header('Location: ../../index.html');
    // echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}
?>