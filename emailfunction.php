<?php 

function sendmail($toemail,$Bcc,$Cc,$body,$subject){

$ename='kingofsulai000@gmail.com';


   //Mail Send:
$mail = new PHPMailer();

$mail->CharSet =  "utf-8";
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Username = "kingofsulai000@gmail.com";
$mail->Password = "supreemgoldstore";
$mail->SMTPSecure = "ssl"; // SSL FROM DATABASE
$mail->Host = 	    "smtp.gmail.com";// Host FROM DATABASE
$mail->Port = 		"465";// Port FROM DATABASE
$mail->setFrom($ename);
$mail->AddAddress($toemail);
$mail->AddBCC($Bcc);
$mail->AddCC($Cc);
// $mail->AddAttachment();

$mail->Subject  = $subject;
$mail->IsHTML(true);
$mail->Body    = '<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>User Details</h2>
  <table class="table table-dark table-hover">
    <thead>
      <tr>
        <th>Username</th>
        <th>Email Id</th>
        <th>Number</th>
        <th>Bcc</th>
        <th>Cc</th>
        <th>Subject</th>
        <th>Address</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        

        </tr>
    </tbody>
</table>
</div>

</body>
</html>'
;

 //check The Email Statuss

 if($mail->Send())
 {
     echo "Success";
 } else {
     echo "Fail";
 }


}





?>
