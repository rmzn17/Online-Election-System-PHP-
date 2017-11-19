<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home Page</title>
  <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="bootstrap/js/bootstrap.min.js"></script>

<link rel="stylesheet" type="text/css" href="CSS/Adminlogin.css">

  <style>

 body {
   
   background-color:#2F4F4F;
font-family: Agency FB;
}



</style>
</head>


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
	if(empty($_POST['uName']))
	{
		$error++;
		$uNameERR="Required";
	}
	else
	{
		$uName=Valid($_POST['uName']);
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
		 
		 
		
	     $query="select * from Admin where AdminUserName='$uName' and Password='$Pass'";
		
		
		 
	    $Complete=mysqli_query($connection,$query) or die("unable to connect");
			   
		
		$Rows=mysqli_fetch_array($Complete);
		
		if($Rows['AdminUserName']==$uName &&$Rows['Password']==$Pass)
		{
				session_start();
		        $_SESSION['uName'] = $uName;
				$_SESSION['Pass'] = $Pass;
			   header("Location:AdminWork.php");
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
<body>

    <div class="container" style="margin-top:40px">
		<div class="row">
			<div class="col-sm-6 col-md-4 col-md-offset-4">
				<div class="panel panel-default">
					<div class="panel-heading">
					<a href="Home.php">Back</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
						<strong>Sign in to continue</strong>
					</div>
					<div class="panel-body">
						<form role="form" action="#" method="POST">
							<fieldset>
								<div class="row">
									<div class="center-block">
										<img class="profile-img"
											src="iMAGE/admin.png" alt="">
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12 col-md-10  col-md-offset-1 ">
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="glyphicon glyphicon-user"></i>
												</span> 
												<input class="form-control" placeholder="Username" name="uName" type="text" value="<?php if(isset($_POST['uName'])) echo $_POST['uName']; ?>"><?php echo $uNameERR;?>
											</div>
										</div>
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="glyphicon glyphicon-lock"></i>
												</span>
												<input class="form-control" placeholder="Password" name="Pass" type="password" value=""><?php echo $PassERR1;?>
											</div>
										</div>
										<div class="form-group">
											<input type="submit" class="btn btn-lg btn-primary btn-block" value="Sign in">
										</div>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
					
                </div>
			</div>
		</div>
	</div>

</body>
</html>

