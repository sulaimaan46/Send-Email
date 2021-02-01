<?php  

include("phpmailer/class.phpmailer.php");

$subject  =$_POST["subject"];
$message 	=$_POST["message"];
$name 	="kingofsulai000@gmail.com";
$pass	="supreemgoldstore";
$to		=$_POST["email"];

                    
$mail = new PHPMailer();
$mail->CharSet =  "utf-8";
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Username = $name;
$mail->Password = $pass;
$mail->SMTPSecure = "ssl"; // SSL FROM DATABASE
$mail->Host = 	    "smtp.gmail.com";// Host FROM DATABASE
$mail->Port = 		"465";// Port FROM DATABASE
$mail->setFrom($name);
$mail->AddAddress($to);
$mail->Subject  = $subject;
$mail->IsHTML(true);
$mail->Body    = $message;

//check The Email Statuss:

if($mail->Send())
{
    echo "Success";
} else {
    echo "Fail";
}
  

?>