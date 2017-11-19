 <?php
    $DATABASE="localhost";
     $username="root";
     $psrd="";
     $dbname = "Election";
     $connection= mysqli_connect($DATABASE,$username,$psrd,$dbname);
    
     $query="select * from SetEC ";
      $Result=mysqli_query($connection,$query);
        
     

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
      font-size: 15px;
      color: #343d44;
     font-family: Agency FB;
      padding: 0;
      margin: 0;
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
      background-color: green;
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
      <li><a href="AddElection.php"><b>New Election</b></a></li>
      <li class="active"><a href="AViewElection.php"><b>View Election</b></a></li>
      <li><a href="AViewResult.php"><b>View Result</b></a></li>
      <li><a href="AEndElection.php"><b>End Election</b></a></li>
    </ul>
	
   <ul class="nav navbar-nav navbar-right">

      <li><a href="AdminLogout.php"><span class="glyphicon glyphicon-user"></span> <b>Logout</b></a></li>
      
    </ul>
  </div>
</nav>

<table  class="data-table">
<thead>
  <tr>
  <th>Election ID</th>
  <th>Election Title</th>
  <th>Cadidates</th>
  <th>Start Date</th>
  <th>End Date</th>
  </tr>
  </thead>

<tbody>
 <?php
   
        
       while ($row = mysqli_fetch_array($Result))
       {

          
          echo '<tr>

            <td>'.$row['ElectionID'].'</td>
            <td>'.$row['ElectionName'].'</td>
          
            <td>'.
              $row['Cand1'].", "
              .$row['Cand2'].", "
              .$row['Cand3']
               .'
            </td>
          
          
            <td>
              '.$row['StartDate'].'
            </td>
         
         
            <td>
              '.$row['EndDate'].'
            </td>
        </tr>';
    echo "<br>";
       }



?>
</tbody>
</table>
</body>
</html>

