
<?php session_start(); ?>


<?php

     $Server="localhost";
     $username="root";
     $psrd="";
     $dbname = "Election";
     $connection= mysqli_connect($Server,$username,$psrd,$dbname);

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home Page</title>
  <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="bootstrap/js/bootstrap.min.js"></script>

  <style>

 body {
  
font-family: Agency FB;
}


    table {
      margin: auto;
      font-family: "Lucida Sans Unicode", "Lucida Grande", "Segoe Ui";
      font-size: 12px;
    }

    h1 {
      margin: 25px auto 0;
      text-align: center;
      text-transform: uppercase;
      font-size: 17px;
    }

    table td {
      transition: all .5s;
    }
    
    /* Table */
    .data-table {
      border-collapse: collapse;
      font-size: 14px;
      min-width: 537px;
    }

    .data-table th, 
    .data-table td {
      border: 1px solid #e1edff;
      padding: 7px 17px;
    }
    .data-table caption {
      margin: 7px;
    }

    /* Table Header */
    .data-table thead th {
      background-color: #508abb;
      color: #FFFFFF;
      border-color: #6ea1cc !important;
      text-transform: uppercase;
    }

    /* Table Body */
    .data-table tbody td {
      color: #353535;
    }
    .data-table tbody td:first-child,
    .data-table tbody td:nth-child(4),
    .data-table tbody td:last-child {
      text-align: right;
    }

    .data-table tbody tr:nth-child(odd) td {
      background-color: #f4fbff;
    }
    .data-table tbody tr:hover td {
      background-color: lightgray;
      border-color: #ffff0f;
    }

    /* Table Footer */
    .data-table tfoot th {
      background-color: #e5f5ff;
      text-align: right;
    }
    .data-table tfoot th:first-child {
      text-align: left;
    }
    .data-table tbody td:empty
    {
      background-color: #ffcccc;
    }


</style>

<script>
  
  function validform(form)
  {


   if ( ( form.vote[0].checked == false ) && ( form.vote[1].checked == false )&& ( form.vote[2].checked == false )) 
  {
  window.alert ( "Please Choose Your Candidate" ); 
  return false;
  }
  return true;
   
   }
</script>

</head>
<body>

<?php

$uname=$_SESSION['uName'];
$title=$_SESSION['election'];
if (isset($_POST['vote'])){

$qry="select * from VoteCheck where UserName='$uname' and ElectionName='$title'";

$col=mysqli_query($connection,$qry);

//$res=mysqli_fetch_array($col);
if (mysqli_num_rows($col) != 0)
  {

   echo "<script> alert('You Already Given Vote') </script>";
  }
else
{



$vote=$_POST['vote'];

$query="select TotVote from Vote where ElectionName='$title' and CandidateName='$vote'";

$Result=mysqli_query($connection,$query);

$row=mysqli_fetch_array($Result);

$ret=$row['TotVote'];

$ret++;
$query="update Vote set TotVote='$ret' where ElectionName='$title' and CandidateName='$vote'";
$Result=mysqli_query($connection,$query);


$q="insert into VoteCheck(ElectionName,UserName) values('$title','$uname')";
mysqli_query($connection,$q);

 echo "<script> alert('Well Done! Successfull') </script>";

}

}
?>


<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Election.Com</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="UserAccount.php"><b>&nbsp&nbsp&nbsp&nbsp Home</b></a></li>
      <li><a href="UserUpdate.php"><b>Update Profile</b></a></li>
      <li  class="active"><a href="UViewElection.php"><b>View Election</b></a></li>
      <li><a href="UViewResult.php"><b>View Result</b></a></li>
    </ul>
  
   <ul class="nav navbar-nav navbar-right">

      <li><a href="UserLogout.php"><span class="glyphicon glyphicon-user"></span> <b>Logout</b></a></li>
      
    </ul>
  </div>
</nav>

 
<form action="" method="POST">
<table class="data-table">
 <thead>
     <tr>
       <th>Election Title </th>      
       <th>Candidate Name</th>
       <th>Candidate Photo</th>
       <th>Candidate Details</th>
       <th>Give Vote</th>
    </tr>
  </thead>

<tbody>

<?php

$title=$_SESSION['election'];

$Cand="select Cand1,Cand2,Cand3 from SetEC where ElectionName='$title'";

$Result=mysqli_query($connection,$Cand);

$Rows=mysqli_fetch_array($Result);


$cand1=$Rows['Cand1'];
$cand2=$Rows['Cand2'];
$cand3=$Rows['Cand3'];

$q1="select * from Candidate where CandidateName='$cand1'";
$cand1details=mysqli_query($connection,$q1);

  $row = mysqli_fetch_array($cand1details);
     
         echo "<tr>";
          echo "<td>";
          echo $title;
           echo "</td>";
           echo "<td>";
          echo $row['CandidateName'];
           echo "</td>";
          echo "<td>";
          echo "<img style='width:100px;height:100px' src='".$row['Photo']."'>";
         echo "</td>";
          echo "<td>";
          echo "<a href='UCanDetails.php'> See Details";
           echo "</td>";
           echo "<td>";
           echo "<input type='radio' name='vote' value=".$row['CandidateName']."> ".$cand1;
          echo "</td>";
          echo "</tr>";

   $q2="select * from Candidate where CandidateName='$cand2'";

   $cand2details=mysqli_query($connection,$q2);

   $row2 = mysqli_fetch_array($cand2details);
     
         echo "<tr>";
          echo "<td>";
          echo $title;
           echo "</td>";
           echo "<td>";
          echo $row2['CandidateName'];
           echo "</td>";
          echo "<td>";
          echo "<img style='width:100px;height:100px' src='".$row2['Photo']."'>";
         echo "</td>";
          echo "<td>";
         echo "<a href='UCanDetails.php'> See Details";
           echo "</td>";

           echo "<td>";
          echo "<input type='radio' name='vote' value=".$row2['CandidateName']."> ".$cand2;
          echo "</td>";
          echo "</tr>";


        $q3="select * from Candidate where CandidateName='$cand3'";
        $cand3details=mysqli_query($connection,$q3);

        $row3 = mysqli_fetch_array($cand3details);
     
         echo "<tr>";
          echo "<td>";
          echo $title;
           echo "</td>";
           echo "<td>";
          echo $row3['CandidateName'];
           echo "</td>";
          echo "<td>";
          echo "<img style='width:100px;height:100px' src='".$row3['Photo']."'>";
         echo "</td>";
          echo "<td>";
           echo "<a href='UCanDetails.php'> See Details";
           echo "</td>";
  
           echo "<td>";
           echo "<input type='radio' name='vote' value=".$row3['CandidateName']."> ".$cand3;
          echo "</td>";
          echo "</tr>";
?>
</tbody>
</table>
<p style=" margin: 1% 0% 0% 75%">
<button type="submit" class="btn btn-primary"  onclick="return validform(this.form)" >Vote Now</button>
</p>
</form>

</body>
</html>

