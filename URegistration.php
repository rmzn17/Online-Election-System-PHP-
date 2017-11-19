<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="bootstrap/js/bootstrap.min.js"></script>
   <link rel="stylesheet" type="text/css" href="CSS/uregistration.css">

<script>

function ValidateRegistrationForm()
{
    var name     =VoterRegistration.Name;
    var uname    =VoterRegistration.uName;
    var Password =VoterRegistration.Pass;
    var email    =VoterRegistration.email;
    var phone    =VoterRegistration.Phone;
    var dob      =VoterRegistration.DOB;
    var gender   =VoterRegistration.gender;
    var address  =VoterRegistration.Address;
    //var Img      =VoterRegistration.Profile;

    if (name.value == "")
    {
        window.alert("Please enter your name.");
        name.focus();
        return false;
    }

    if (!/^[a-zA-Z]*$/g.test(name.value)) {
        alert("Invalid characters");
        name.focus();
        return false;
    }

    if (uname.value == "")
    {
        window.alert("Please enter your username.");
        uname.focus();
        return false;
    }
    if (Password.value == "")
    {
        window.alert("Please enter your Password.");
        Password.focus();
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
        window.alert("Please enter your telephone number.");
        phone.focus();
        return false;
    }

    if (phone.value.length != 11)
    {
        window.alert("Please  your telephone number must be 11 digit.");
        phone.focus();
        return false;
    }


    if (dob.value == "")
    {
        window.alert("Please Date of Birth.");
        dob.focus();
        return false;
    }
    if (gender.value == "")
    {
        window.alert("Please provide Gender.");
        gender.focus();
        return false;
    }
    if (address.value == "")
    {
        window.alert("Please provide Your Address");
        address.focus();
        return false;
    }

    return true;
}

  function allLetter(inputtxt)  
  {  
   var letters = /^[A-Za-z]+$/;  
   if(inputtxt.value.match(letters))  
     {  
      return true;  
     }  
   else  
     {  
   
     return false;  
     }  
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

<script type="text/javascript" src="http://www.clubdesign.at/floatlabels.js"></script>

<form  method="POST" action="Userinfo.php" enctype="multipart/form-data" name="VoterRegistration"  onsubmit="return ValidateRegistrationForm();">
<div class="container">
        <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
          <div class="panel panel-default">
            <div class="panel-heading">
            <a href="UserLogin.php">Back</a>
              <h3 class="panel-title">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspPlease sign up for Voting</h3>
            </div>
            <div class="panel-body">
              <form role="form">
        
                  <div class="form-group">
                  <input type="text" name="Name" class="form-control input-sm" placeholder="Your Full Name">
                </div>
                 <div class="form-group">
                  <input type="text" name="uName" class="form-control input-sm" placeholder="Your User Name">
                </div>

                  <div class="form-group">
                  <input type="Password" name="Pass" id="Password" class="form-control input-sm" placeholder="Password">
                </div>

               
                <div class="form-group">
                  <input type="email" name="email" id="email" class="form-control input-sm" placeholder="Email Address" size="35">
                </div>
                 <div class="form-group">
                  <input type="phone" name="Phone" id="Phone" class="form-control input-sm" placeholder="Phone Number">
                </div>

                <div class="form-group">
                  <input type="date" name="DOB" id="DOB" class="form-control input-sm">
                </div>

                <div class="form-group">
                  <input type="radio" name="gender" value="Male" style="border:5px solid green;"/>Male
                  <input type="radio" name="gender" value="Female"/>Female 
                </div>
                <div class="form-group">
                  <input type="text" name="Address" placeholder="Address" class="form-control input-sm">
                </div>
                 <div class="form-group">
                 <input type="file" name="image"/>
               </div>

               <div>
                <input type="submit" value="Register" class="btn btn-info btn-block">
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</form>
</body>
</html>

