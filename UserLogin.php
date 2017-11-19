<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home Page</title>
  <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="bootstrap/js/bootstrap.min.js"></script>
   <link rel="stylesheet" type="text/css" href="CSS/userlogin.css">
  <style>

 body {
 	background-image: url(background/user.jpg);
 
font-family: Agency FB;
}



</style>
</head>
<body>

<?php 

$uName="";
$Pass="";



$uNameERR="";
$UsereXIST="";
$PassERR1="";
$PassERR2="";



if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    function Valid($Information)
	{
		$Information=trim($Information);
		$Information=stripcslashes($Information);
		$Information=htmlspecialchars($Information);
		return $Information;
	}
	
     

	$error=0;
	if(empty($_POST['Voter']))
	{
		$error++;
		$uNameERR="Required";
	}
	else
	{
		$uName=Valid($_POST['Voter']);
	}
	
	
	if(empty($_POST['Pass']))
	{
		$error++;
		$PassERR1="Required, ";
	}
	else
	{
		$Pass=Valid($_POST['Pass']);
	}
	

	
	
	if($error==0)
	{
	
   

	     $Server="localhost";
		 $username="root";
		 $psrd="";
		 $dbname = "Election";
		 $connection= mysqli_connect($Server,$username,$psrd,$dbname);
		 
		 
		
	     $query="select * from Voter where VoterUserName='$uName' and Password='$Pass'";
		
		
		 
	    $Complete=mysqli_query($connection,$query) or die("unable to connect");
			   
		
		$Rows=mysqli_fetch_array($Complete);

		$name=$Rows['VoterName'];
		$email=$Rows['Email'];
		$phone=$Rows['Mobile'];
		$address=$Rows['Address'];;
		
		if($Rows['VoterUserName']==$uName &&$Rows['Password']==$Pass)
		{

				session_start();
		        $_SESSION['uName'] = $uName;
				$_SESSION['Pass'] = $Pass;
				

			   header("Location:UserAccount.php");
		     exit();
		 
		}
		else
		{
		echo "<script>alert('Wrong User Name Or Password Try Again');</script>";
		}
		
			mysqli_close($connection);  			 			 		   
	 }
   
}
	

?>


<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h1 class="text-center login-title"><b>Sign in to continue</b></h1>
            <div class="account-wall">
                <img class="profile-img" src="Image/user.png " alt="">
                <form class="form-signin" action="" method="POST">
                <input type="text" class="form-control" name="Voter" placeholder="Voter User Name" required autofocus>
                <input type="password" class="form-control" name="Pass" placeholder="Password" required>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
               <label class="checkbox pull-left"> &nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp
                    <input type="checkbox" value="remember-me">Remember me
                </label>
                <a href="UForgot.php" class="pull-right need-help">Forgot Password?</a><span class="clearfix"></span>
                </form>
                 <a href="Home.php">&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbspBack</a>
            </div>
            <a href="URegistration.php" class="text-center new-account"><h3><b><span style="color: white">Create an account</span></b></h3> </a>
        </div>
    </div>
</div>


</body>
</html>

