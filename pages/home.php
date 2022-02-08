<?php
  session_start();
  include './code/connection.php';
  include './code/loginCheckCode.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/home.css">
    <link rel="stylesheet" href="../style/general.css">
</head>
<body>
<?php
  $name=$_SESSION['name'];
  $sql="select * from login where username='$name'";
  $query=mysqli_query($conn,$sql);
  $row=mysqli_fetch_assoc($query);
  $des=$row['designation'];
  if($des==2)
  {
      include './includeFiles/navbar.php';
  }
  else
  {
      include './includeFiles/navbarEmp.php';
  }
?>
<div class="container">
  <div class="box">
    <h3>Manage Employee</h3>
    <p>Register employee for your shop. Save details and provide them the username and password inorder to give access to the system for billing and checkout.</p>
    <a href="empAdd.php">Click Here to Register</a>
    <a href="empDisp.php">View Existing Employees</a>
  </div>
  <div class="box">
    <h3>Manage Inventory</h3>
    <p>Add Items to the inventory with correct details. It helps us to keep records of your sales and availability or non-availability of items.</p>
    <a href="inventoryAdd.php">Click To Add New Item</a>
    <a href="inventoryDisp.php">View Inventory</a>
  </div>
  <div class="box">
    <h3>Sales Details</h3>
    <p>Provides you with all the sales details of your shop along with date, employee incharge & total amount of sales.</p>
    <a href="report.php">View Report</a>
  </div>
</div>
<?php
  include("includeFiles/footer.html");
?>


</body>
</html>
