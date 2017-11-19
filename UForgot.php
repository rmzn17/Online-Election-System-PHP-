<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home Page</title>
  <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="bootstrap/js/bootstrap.min.js"></script>
   <link rel="stylesheet" type="text/css" href="CSS/Forgot.css">

  <style>

 body {
font-family: Agency FB;
}



</style>


<script>
  
function ValidateContactForm()
{

 
    var Email=ContactForm.Email;
    var Pass=ContactForm.Password1;
    var conpass=ContactForm.Password2;


    if (Email.value=="") 
    {
      window.alert("Enter Your Email");
      Email.focus();
      return false;
    }

   if (!validateCaseSensitiveEmail(Email.value))
    {
        window.alert("Please enter a valid e-mail address.");
        email.focus();
        return false;
    }
 if (Pass.value=="") 
    {
      window.alert("Enter Password");
      Pass.focus();
      return false;
    }

    if (conpass.value=="") 
    {
      window.alert("Confirm Password");
      conpass.focus();
      return false;
    }

    if(Pass.value!=conpass.value)
    {
       window.alert("Password Miss match");
      Pass.focus();
      return false;
    }
    return true;

}
function validateCaseSensitiveEmail(email) 
{ 
 var reg = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/;
 if (reg.test(email)){
 return true; 
}
 else{
 return false;
 } 
} 

</script>
</head>
<body>

<?php

if ($_SERVER['REQUEST_METHOD']=='POST')
{
 
 $email=$_POST['Email'];
 $Pass=$_POST['Password1'];

 $server="localhost";
 $username="root";
 $password="";
 $db="Election";


 $connection=mysqli_connect($server,$username,$password,$db);

 $search="select * from Voter where Email='$email'";

 $execute=mysqli_query($connection,$search);


 if (mysqli_num_rows($execute) > 0) {

  $query="update Voter set Password='$Pass' where Email='$email'";

  mysqli_query($connection,$query);
  echo "<script> alert('Update Successfully') </script>";

  header("Location:UserLogin.php");


  
 }
 else
 {
  
 echo "<script> alert('Email Does not Exist') </script>";
echo "<script> Pass.focus();</script>";

 }

}
?>




<div class="container">
    <div class="row">
        <div class="login">
  <div class="login-triangle"></div>
  <h2 class="login-header">Change Password</h2>
<form class="login-container" method="post" action="" name="ContactForm" onsubmit="return ValidateContactForm();">

     <p><input type="email" placeholder="Email" name="Email"></p>
    <p><input type="password" placeholder="New Password" name="Password1"></p>
    <p><input type="password" placeholder="Confirm Password" name="Password2"></p>
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="UserLogin.php">Back</a>
    <p><input type="submit" value="Change"></p>
  </form>
</div>>
    </div>
</div>

</body>
</html>

