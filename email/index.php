<?php 
//     $result = "";
//     $error  = "";
//   if(isset($_POST['submit']))
//   {
//     require 'phpmailer/PHPMailerAutoload.php';
//     $mail = new PHPMailer;
//     //smtp settings
//     $mail->isSMTP(); // send as HTML
//     $mail->Host = "smtp.gmail.com"; // SMTP servers
//     $mail->SMTPAuth = true; // turn on SMTP authentication
//     $mail->Username = "Your mail"; // Your mail
//     $mail->Password = 'Your password mail'; // Your password mail
//     $mail->Port = 587; //specify SMTP Port
//     $mail->SMTPSecure = 'tls';                               
//     $mail->setFrom($_POST['email'],$_POST['name']);
//     $mail->addAddress('Your mail');
//     $mail->addReplyTo($_POST['email'],$_POST['name']);
//     $mail->isHTML(true);
//     $mail->Subject='Form Submission:' .$_POST['subject'];
//     $mail->Body='<h3>Name :'.$_POST['name'].'<br> Email: '.$_POST['email'].'<br>Message: '.$_POST['message'].'</h3>';
//     if(!$mail->send())
//     {
//       $error = "Something went worng. Please try again." . $mail->error;
//     }
//     else 
//     {
//       $result="Thanks\t" .$_POST['name']. " for contacting us.";
//     }
//   }

?>

<?php
    //Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// //Load Composer's autoloader
require '../email/phpmailer/PHPMailerAutoload.php';
if(isset($_POST['submit'])){
	$email = $_POST['email'];
require_once '../src/PHPMailer.php';
require_once '../src/SMTP.php';
require_once '../src/Exception.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'goodam198@gmail.com';                     //SMTP username
    $mail->Password   = 'goodluckdaniel1998';                               //SMTP password
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('goodam198@gmail.com', 'Mailer');
    $mail->addAddress('nenghajm@gmail.com', 'Joe User');     //Add a recipient           //Name is optional
    $mail->addReplyTo('goodam198@gmail.com', 'Information');
    // $mail->addCC(' ');
    // $mail->addBCC(' ');

    // //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Oyaa Goodam';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';


    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>soengsouy.com</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--========================================================================================-->
	<link href='https://www.soengsouy.com/favicon.ico' rel='icon' type='image/x-icon'/>
	<!--========================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<!--=========================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--=========================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<!--=========================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<!--=========================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<!--=========================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--=========================================================================================-->
</head>
<body>

	<div class="contact1">
		<div class="container-contact1">
			<div class="contact1-pic js-tilt" data-tilt>
				<img src="images/img-01.png" alt="IMG">
			</div>
			<form action="" method="post" class="contact1-form validate-form">
				<span class="contact1-form-title">
					 CONTACT FORM
				</span>
				<h6 class="text-center text-success"> <?=$result; ?></h6>
				<h6 class="text-center text-danger"> <?=$error; ?></h6>
				<br>
				<div class="wrap-input1 validate-input" data-validate = "Name is required">
					<input class="input1" type="text" name="name" placeholder="Name">
					<span class="shadow-input1"></span>
				</div>

				<div class="wrap-input1 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
					<input class="input1" type="text" name="email" placeholder="Email">
					<span class="shadow-input1"></span>
				</div>

				<div class="wrap-input1 validate-input" data-validate = "Subject is required">
					<input class="input1" type="text" name="subject" placeholder="Subject">
					<span class="shadow-input1"></span>
				</div>

				<div class="wrap-input1 validate-input" data-validate = "Message is required">
					<textarea class="input1" name="message" placeholder="Message"></textarea>
					<span class="shadow-input1"></span>
				</div>

				<div class="container-contact1-form-btn">
					<button type="submit" name="submit" class="contact1-form-btn">
						<span>
							Send Email
							<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
						</span>
					</button>
				</div>
			</form>
		</div>
	</div>

	<!--====================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--====================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--=====================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<!--=====================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

<!--=========================================================-->
	<script src="js/main.js"></script>

</body>
</html>
