<?php  

include("phpmailer/class.phpmailer.php");
include("emailfunction.php");


$name=$_POST["name"];
$subject  =$_POST["subject"];
$body	=$_POST["message"];
$phonenumber=$_POST["phnumber"];
$address=$_POST["address"];
$toemail		=$_POST["email"];
$Bcc		=$_POST["emailbcc"];
$Cc		=$_POST["emailcc"];
$upload = $_FILES["fileupload"]["name"];


if (isset($_POST["submit"])){
  
  $open=array("jpg"=>"image/jpg","jpeg"=>"image/jpeg","png"=>"image/png","pdf"=>"application/pdf","html"=>"text/html","docx"=>"application/vnd.openxmlformats-officedocument.wordprocessingml.document");
  $filename=$_FILES["fileupload"]["name"];
  $type=$_FILES["fileupload"]["type"];
  $sourcePath = $_FILES['fileupload']['tmp_name'];
  // echo $type;
  $ext=pathinfo($filename,PATHINFO_EXTENSION);
  // echo $ext;

  if(!array_key_exists($ext,$open)) die("The File Format is not valid");

  if(in_array($type,$open))
  {
    
    $targetPath = "uploadedfiles/".$_FILES["fileupload"]["name"];

    if(move_uploaded_file($sourcePath,$targetPath)){


      $createdon=md5(uniqid(rand(), true));
      $temp = explode(".", $_FILES["fileupload"]["name"]);
      $newfilename = $createdon . '.' . end($temp);
      $newFilePath = "uploadedfiles/" . $newfilename;

      echo "File Was Uploaded Sucessfully";

     $send= sendmail($toemail,$Bcc,$Cc,$body,$subject);
    
    }
    else{

      echo "File was Uploded Declined";
    }
  }

  else
  {
      echo "The File was not Uploaded";
  }
}



 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "emailsend";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

   
    // Check connection
    if ($conn->connect_error)
    {
        die("Connection failed: " . $conn->connect_error);
    }
    $email = "INSERT INTO userdetails (name, phone_number, email, bcc, cc, subject, message, address, files)VALUES ('$name','$phonenumber', '$toemail', '$Bcc', '$Cc', '$subject', '$body', '$address', '$newfilename')";
    //  echo $sql;exit;
    if ($conn->query($email) === true)
    {
      mysqli_close($conn);
      // header('Location: http://localhost/learn/project2/crud_index.php'); //If book.php is your main page where you list your all records
      exit;
        echo "New record created successfully";
    }
    else
    {
        echo "Error: " . $email . "<br>" . $conn->error;
    }

    $conn->close();
?>