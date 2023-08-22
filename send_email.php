<?php
session_start();
if (!isset($_SESSION['verify'])) {
    $_SESSION['verify'] = false;
}
// To Remove unwanted errors
error_reporting(0);

// Add your connection Code
include("common/connection.php");

// Important Files (Please check your file path according to your folder structure)
require "PHPMailer-master/src/PHPMailer.php";
require "PHPMailer-master/src/SMTP.php";
require "PHPMailer-master/src/Exception.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

// Email From Form Input
// $send_to_email = $_POST["email"];
if(!empty($_SESSION['verify']))
{
$send_to_email = $email;
 $send_to_name = $name;
 $verification_otp = random_int(100000, 999999);
}

// Full Name of User
// $send_to_name = $_POST["name"];

function sendMail($send_to, $otp, $name) {
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "tls";
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Enter your email ID
    $mail->Username = "dknov2000@gmail.com";
    $mail->Password = "dwplbsesnuwdymqn";

    // Your email ID and Email Title
    $mail->setFrom("dknov2000@gmail.com", "Dushyanta Kashyap");

    $mail->addAddress($send_to);

    // You can change the subject according to your requirement!
    $mail->Subject = "Blood Donor Registration";

    // You can change the Body Message according to your requirement!
    $mail->Body = "Hello, {$name}\nYour account registration is successfully done! Now activate your account with OTP {$otp}.";
    $mail->send();
	$_SESSION['verify']="set";
	
}

sendMail($send_to_email, $verification_otp, $send_to_name);

// Message to print email success!
echo "Email Sent Successfully!";

// if (isset($_POST['verify'])) {
    // $otpp = $_POST['otpp'];
    
    // if ($otpp == $_SESSION['verification_otp']) {
        // $_SESSION['verified'] = true;
    // } else {
        // $_SESSION['verified'] = false;
    // }
// }

?>
<html>
	<head>
		<title>blood_bank</title>
		<link rel="stylesheet" href="css/style.css"/>
		
	</head>
	<!--body begins from  here-->
	<body>
		<form method="POST" action="index1.php">
		<input type="text" placeholder="Enter the OTP.." name="otpp" class="f" />
		<input type="submit" name="verify" value="Submit" class="s" />
		</form>
	</body>
</html>