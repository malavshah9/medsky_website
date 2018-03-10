<?php
session_start();
require '../Shared/Classes/classusr.php';

                                $pass=null;
                $cnn=new usr_all;
                $enteredid=$_SESSION["id"];
                $result=$cnn->getpassword($enteredid);
                $pass=$result;
                           


error_reporting(E_ALL & ~E_DEPRECATED & ~E_NOTICE);
require_once "../Shared/phpmailer/class.phpmailer.php";

$message="Your password is ".$pass;
// creating the phpmailer object
$mail = new PHPMailer(true);

// telling the class to use SMTP
$mail->IsSMTP();

// enables SMTP debug information (for testing) set 0 turn off debugging mode, 1 to show debug result
$mail->SMTPDebug = 0;

// enable SMTP authentication
$mail->SMTPAuth = true;

// sets the prefix to the server
$mail->SMTPSecure = 'ssl';

// sets GMAIL as the SMTP server
$mail->Host = 'smtp.gmail.com';

// set the SMTP port for the GMAIL server
$mail->Port = 465;

// your gmail address
$mail->Username = 'medskyy@gmail.com';

// your password must be enclosed in single quotes
$mail->Password =  'crushed009';

// add a subject line
$mail->Subject = 'Forget Password';

// Sender email address and name
$mail->SetFrom('medsky@gmail.com', 'info.medsky');

$email1=$enteredid;
// reciever address, person you want to send
$mail->AddAddress($email1);

// if your send to multiple person add this line again
//$mail->AddAddress('tosend@domain.com');

// if you want to send a carbon copy
//$mail->AddCC('tosend@domain.com');


// if you want to send a blind carbon copy
//$mail->AddBCC('tosend@domain.com');

// add message body
$mail->MsgHTML($message);


// add attachment if any
//$mail->AddAttachment('time.png');

try {
    // send mail
	
	//don't forget to enable openssl true from php_extensions
    $mail->Send();
    $msg = "Mail send successfully";
 

} catch (phpmailerException $e) {
    $msg = $e->getMessage();
} catch (Exception $e) {
    $msg = $e->getMessage();
}
header('location:../visitor/patientlogsign.php');

echo $msg;
?>
