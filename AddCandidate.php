<!DOCTYPE html>
<html lang="en">
<head>
 <title>Election </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="bootstrap/js/bootstrap.min.js"></script>

  <style>

 body {
  
font-family: Agency FB;
}

form { margin: 0px 10px; }

h2 {
  margin-top: 2px;
  margin-bottom: 2px;
}

.container { max-width: 360px; }

.divider {
  text-align: center;
  margin-top: 20px;
  margin-bottom: 5px;
}

.divider hr {
  margin: 7px 0px;
  width: 35%;
}

.left { float: left; }

.right { float: right; }



</style>


<script>

function ValidateCandidateForm()
{
    var name     =CandidateForm.Cname;
    var email    =CandidateForm.Cemail;
    var phone    =CandidateForm.Cphone;
    var address  =CandidateForm.Caddress;
    var description=CandidateForm.Cdescription;

    if (name.value == "")
    {
        window.alert("Please Enter Candidate Name.");
        name.focus();
        return false;
    }
    
   if (!/^[a-zA-Z]*$/g.test(name.value)) {
        alert("Invalid characters");
        name.focus();
        return false;
    }


    if (!validateCaseSensitiveEmail(email.value))
    {
        window.alert("Please enter a valid e-mail address.");
        email.focus();
        return false;
    }



    if (phone.value == "")
    {
        window.alert("Please Enter Candidate Phone Number.");
        phone.focus();
        return false;
    }

    if (phone.value.length != 11)
    {
        window.alert(" Phone number must be 11 digit.");
        phone.focus();
        return false;
    }

    if (address.length== 0)
    {
        window.alert("Please provide Candidate Address");
        comment.focus();
        return false;
    }

    if (destination.length== 0)
    {
        window.alert("Please provide Candidate Description");
        comment.focus();
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
if ($_SERVER["REQUEST_METHOD"] == "POST") {

     $Server="localhost";
     $username="root";
     $psrd="";
     $dbname = "Election";
     $connection= mysqli_connect($Server,$username,$psrd,$dbname);

         $name     =$_POST['Cname'];
         
         $email    =$_POST['Cemail'];
         $phone    =$_POST['Cphone'];
         $address  =$_POST['Caddress'];
         $description  =$_POST['Cdescription'];

         $destination = "CanPhoto/".$_FILES['Cpicture']['name'];
         $filename    = $_FILES['Cpicture']['tmp_name'];  

         move_uploaded_file($filename, $destination);

         $query="insert into Candidate(CandidateName,Email,Mobile,Address,Description,Photo) values('$name','$email','$phone','$address','$description','$destination')";
         $ret= mysqli_query($connection,$query);
      
        echo '<script language="javascript">';
        echo 'alert("Registration successfully")';
        echo '</script>';
     
      }

?>



<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Election.Com</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="AdminWork.php"><b>&nbsp&nbsp&nbsp&nbsp Home</b></a></li>
      <li class="active"><a href="AddCandidate.php"><b>Add Candidate</b></a></li>
      <li><a href="AddElection.php"><b>New Election</b></a></li>
      <li><a href="AViewElection.php"><b>View Election</b></a></li>
      <li><a href="AViewResult.php"><b>View Result</b></a></li>
      <li><a href="AEndElection.php"><b>End Election</b></a></li>
    </ul>
	
   <ul class="nav navbar-nav navbar-right">
 
      <li><a href="AdminLogout.php"><span class="glyphicon glyphicon-user"></span> <b>Logout</b></a></li>
      
    </ul>
  </div>
</nav>
  


  <div class="container">
    <div class="row">
      <div class="panel panel-primary">
        <div class="panel-body">
          <form method="POST" enctype="multipart/form-data" action="#" role="form" name="CandidateForm" onsubmit="return ValidateCandidateForm();">
            <div class="form-group">
              <h2>Add New Candidate</h2>
            </div>
            <div class="form-group">
              <label class="control-label" for="signupName">Candidate name</label>
              <input type="text" name="Cname" maxlength="50" class="form-control" required>
            </div>
          
            <div class="form-group">
              <label class="control-label" for="signupEmail">Candidate Email</label>
              <input id="signupEmail" type="email" name="Cemail" maxlength="50" class="form-control" required>
            </div>
            <div class="form-group">
              <label class="control-label">Candidate Phone</label>
              <input  type="Phone" name="Cphone" maxlength="50" class="form-control" required>
            </div>
            
             <div class="form-group">
              <label class="control-label">Candidate Address</label>
              <textarea rows="2" cols="56" name="Caddress"> </textarea>
            </div>
             <div class="form-group">
              <label class="control-label">Candidate Description</label>
              <textarea rows="2" cols="56" name="Cdescription"> </textarea>
            </div>
             <div class="form-group">
              <input  type="file" name="Cpicture">
            </div>

            

            <div class="form-group">
              <button id="signupSubmit" type="submit" class="btn btn-info btn-block">Add Candidate Now</button>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>


</body>
</html>

