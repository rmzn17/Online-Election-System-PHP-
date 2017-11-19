<?php
$Server="localhost";
     $username="root";
     $psrd="";
     $dbname = "Election";
     $connection= mysqli_connect($Server,$username,$psrd,$dbname);
	 
	 
if ($_SERVER["REQUEST_METHOD"] == "POST") {

     
     $EID=$_POST['Electionid'];
     $Etitle=$_POST['ElectionTitle'];
     $sdate=$_POST['startDate'];
     $edate=$_POST['EndDate'];
     $can1=$_POST['cann1'];
     $can2=$_POST['cann2'];
     $can3=$_POST['cann3'];

      $query="insert into SetEC values('$EID','$Etitle','$sdate','$edate','$can1','$can2','$can3')";
         $ret= mysqli_query($connection,$query);

       $cvote=0;
      $query1="insert into Vote(ElectionID,ElectionName,CandidateName,TotVote) values('$EID','$Etitle','$can1','$cvote')";
       mysqli_query($connection,$query1);


       $cvote=0;
      $query2="insert into Vote(ElectionID,ElectionName,CandidateName,TotVote) values('$EID','$Etitle','$can2','$cvote')";
       mysqli_query($connection,$query2);


       $cvote=0;
      $query3="insert into Vote(ElectionID,ElectionName,CandidateName,TotVote) values('$EID','$Etitle','$can3','$cvote')";
       mysqli_query($connection,$query3);

        echo '<script language="javascript">';
        echo 'alert("Registration successfully")';
        echo '</script>';
}
?>
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
   background-color:#2F4F4F;

font-family: Agency FB;
}

form 
{ margin: 0px 10px; 

}

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

#heading
{
 text-align:center;
 margin-top:10px;
 font-size:30px;
 color:#228B22;
}
#can1
{
 width:400px;
 background-color:#20B2AA;
 padding:2px;
 height:40px;
 border-radius:5px;
 box-shadow:0px 0px 10px 0px grey;
}
#can2
{
 width:400px;
background-color:#20B2AA;
 padding:2px;
 height:40px;
 border-radius:5px;
 box-shadow:0px 0px 10px 0px grey;
}
#can3
{
 width:400px;
background-color:#20B2AA;
 padding:2px;
 height:40px;
 border-radius:5px;
 box-shadow:0px 0px 10px 0px grey;
}
select
{
 width:400px;
 height:40px;
 border:1px solid #20B2AA;
 margin-top:20px;
 padding:2px;
 font-size:20px;
 color:grey;
 border-radius:5px;

}

input
{
  width:400px;
 height:40px;
 border:1px solid #20B2AA;
 margin-top:20px;
 padding:2px;
 font-size:20px;
 color:grey;
 border-radius:5px;
 background-color:#FFF5EE;
}
</style>


<script type="text/javascript">
  
 function validform()
 {
   var electionID =ElectionForm.Electionid;
   var Etitle=ElectionForm.ElectionTitle;
   var sdate=ElectionForm.startDate;
   var edate=ElectionForm.EndDate;
   /*var c1 = document.getElementById("select_box");
   var strUser1 = c1.options[c1.selectedIndex].value;
   var strUser11 = c1.options[c1.selectedIndex].text;

   var c2 = document.getElementById("select_box");
   var strUser2 = c2.options[c2.selectedIndex].value;
   var strUser22 = c2.options[c2.selectedIndex].text;

   var c3 = document.getElementById("select_box");
   var strUser = c3.options[c3.selectedIndex].value;
   var strUser1 = c3.options[c3.selectedIndex].text;


*/

/*var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0!

var yyyy = today.getFullYear();
if(dd<10){
    dd='0'+dd;
} 
if(mm<10){
    mm='0'+mm;
} 
var today = dd+'/'+mm+'/'+yyyy;

*/

   if (electionID.value=="")
   {
      window.alert("Need A Election ID");
      electionID.focus();
      return false;
   }

 if (Etitle.value=="")
   {
      window.alert("Need A Election Title");
      Etitle.focus();
      return false;
   }

   if (sdate.value=="")
   {
      window.alert("Need  Election Start Date");
      sdate.focus();
      return false;
   }


 if (edate.value=="")
   {
      window.alert("Need Election End Date");
      edate.focus();
      return false;
   }


    if(document.getElementById("can1").value == "Select Candidate-1")
   {
      alert("Please select Candidate-1"); // prompt user
      document.getElementById("can1").focus(); //set focus back to control
      return false;
   }
    if(document.getElementById("can2").value == "Select Candidate-2")
   {
      alert("Please select Candidate-2"); // prompt user
      document.getElementById("can2").focus(); //set focus back to control
      return false;
   }
   
    if(document.getElementById("can3").value == "Select Candidate-3")
   {
      alert("Please select Candidate-3"); // prompt user
      document.getElementById("can3").focus(); //set focus back to control
      return false;
   }
 if(document.getElementById("can1").value ==document.getElementById("can2").value || document.getElementById("can1").value ==document.getElementById("can3").value||document.getElementById("can2").value ==document.getElementById("can3").value)
   {
      alert("Two Candidate Can Not Be Same"); // prompt user
      document.getElementById("can3").focus(); //set focus back to control
      return false;
   }


   return true;

 }

</script>
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Election.Com</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="AdminWork.php"><b>&nbsp&nbsp&nbsp&nbsp Home</b></a></li>
      <li><a href="AddCandidate.php"><b>Add Candidate</b></a></li>
      <li class="active"><a href="AddElection.php"><b>New Election</b></a></li>
      <li><a href="AViewElection.php"><b>View Election</b></a></li>
      <li><a href="AViewResult.php"><b>View Result</b></a></li>
      <li><a href="AEndElection.php"><b>End Election</b></a></li>
    </ul>
	
   <ul class="nav navbar-nav navbar-right">
 
    </form>
      <li><a href="AdminLogout.php"><span class="glyphicon glyphicon-user"></span> <b>Logout</b></a></li>
      
    </ul>
  </div>
</nav>
  
 

<p id="heading">Add New Election</p>
<center>
 <form action="" method="POST" name="ElectionForm" onsubmit="return validform();">
    <input type="text" name="Electionid" placeholder="Enter Election ID"><br>
     <input type="text" name="ElectionTitle" placeholder="Election Title"><br>
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp                                                                                        <input type="date" name="startDate"><span style="color: green">START DATE</span><br>
          &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp                                                                                                  <input type="date" name="EndDate"><span style="color: green">END DATE</span>

<br><div>

 <select name="cann1" id="can1" onchange="fetch_select(this.value);">
 <option>Select Candidate-1</option>
  <?php

  $select=mysqli_query($connection,"select CandidateName from Candidate group by CandidateName");

  while($row=mysqli_fetch_array($select))
  {
   echo "<option>".$row['CandidateName']."</option>";
  }
  
 ?>
 </select><br>

</div>   
</center>

<center>

<div>

 <select  name="cann2" id="can2" onchange="fetch_select(this.value);">
  <option>Select Candidate-2</option>
  <?php

  $select=mysqli_query($connection,"select CandidateName from Candidate group by CandidateName");

  while($row=mysqli_fetch_array($select))
  {
   echo "<option>".$row['CandidateName']."</option>";
  }
  
 ?>
 </select>

</div>   
</center>
<center>

<div>
 <select name="cann3" id="can3" onchange="fetch_select(this.value);">
  <option>Select Candidate-3</option>
  <?php
  $select=mysqli_query($connection,"select CandidateName from Candidate group by CandidateName");

  while($row=mysqli_fetch_array($select))
  {
   echo "<option>".$row['CandidateName']."</option>";
  }
  
 ?>
 </select>
</div>   
</center>
 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp   &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp                                          <div align="center"><input type="submit" name="submit" value="Set Election"></div>
</form>
</body>
</html>

