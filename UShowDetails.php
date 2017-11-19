
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
  <title>Election </title>
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
      background-color:#A52A2A;
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
      background-color: #20B2AA;
      border-color: #ffff0f;
    }

    /* Table Footer */
    .data-table tfoot th {
      background-color: green;
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
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Election.Com</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="UserAccount.php"><b>&nbsp&nbsp&nbsp&nbsp Home</b></a></li>
      <li><a href="UserUpdate.php"><b>Update Profile</b></a></li>
      <li><a href="UViewElection.php"><b>View Election</b></a></li>
      <li  class="active"><a href="UViewResult.php"><b>View Result</b></a></li>
    </ul>
  
   <ul class="nav navbar-nav navbar-right">
      <li><a href="UserLogout.php"><span class="glyphicon glyphicon-user"></span> <b>Logout</b></a></li>
      
    </ul>
  </div>
</nav>

<table class="data-table">
 <thead>
     <tr>
       <th>Election Title </th>      
       <th>Candidate Name</th>
       <th>Vote</th>
    </tr>
  </thead>

<tbody>

<?php

$title=$_SESSION['election'];


    $qry="select * from Vote where ElectionName='$title' ORDER BY TotVote DESC ";
    $Rows=mysqli_query($connection,$qry);

  while($row = mysqli_fetch_array($Rows))
  {
     
         echo "<tr>";
          echo "<td>";
          echo $title;
           echo "</td>";
           echo "<td>";
          echo $row['CandidateName'];
           echo "</td>";
           echo "<td>";
          echo $row['TotVote'];
          echo "</td>";
          echo "</tr>";
      }
   
?>
</tbody>
</table>
</body>
</html>

