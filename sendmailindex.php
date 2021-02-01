<!DOCTYPE html>
<html lang="en">
<head>
  <title>Send Email</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Email</h2>
  <h3 class="notification"></h3>
  <form action="" id=myForm method="post">
  <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter Your Name" >
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter Your Email" >
    </div>
    <div class="form-group">
      <label for="email">Bcc:</label>
      <input type="email" class="form-control" id="emailbcc" placeholder="Enter Your Email" >
    </div>
    <div class="form-group">
      <label for="email">CC:</label>
      <input type="email" class="form-control" id="emailcc" placeholder="Enter Your Email" >
    </div>
    <div class="form-group">
      <label for="subject">Subject:</label>
      <input type="text" class="form-control" id="subject" placeholder="Enter Subject" >
    </div>
    <div class="form-group">
      <label for="message">Message:</label>
      <textarea id="message" class="md-textarea form-control" rows="5" placeholder="Enter Message"></textarea>
      </div>
    
    <button type="button" class="btn btn-primary" onclick="sendemail()" >Send</button>
  </form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
 
 function sendemail(){

     var name=$("#name").val();
     var subject=$("#subject").val();
     var message=$("#message").val();
     var email=$("#email").val();
     var bcc=$("#emailbcc").val();
     var cc=$("#emailcc").val();



     
     
     //convert To Array:
     if(email != 0){

     var demail=$("#email").val();
     var arremail = demail.split(',');

     $.each(arremail, function( index, value ) {
    //    alert( index + ": " + value );
       var email = value;
       alert(email);
       $.ajax({

            url:"sendmailin2.php",
            method:"POST",
            datatype:"json",
            data:{
                name: name,
                email: email,
                subject: subject,
                message: message,
                Bcc:bcc,
                Cc:cc
            } , success:function(response){

               alert("EMail Was Sended Sucessfully");
            }

        })
    });

    }else{
        alert("Email is Not Set");
    }

     }

</script>
</body>
</html>