<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/aboutUs.css">
    <link rel="stylesheet" href="../style/general.css">
</head>
<body>
    <?php
    session_start();
    include './code/connection.php';
    include './code/loginCheckCode.php';
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
      <h1>The Retail Store</h1>
      <div id="head">
          <h2>Introduction</h2>
        <p>
            The main objective of this website is to enable the user to manage their store in the most efficient way to manage inventory, employees and view accounting details. The user can login to dashboard as Admin, Manager i.e Store owner or employee.
                <br>
            For every user the dashboard providing different functionalities to manager it gives access to Inventory, employee details and Billing details to an employee it gives access its profile and bill generation and to an Admin it gives access to all the way of system. Our main concept is to enable this website access to managers to manage their shop efficiently and output proper management of employee and items in the store.
        </p>
      </div>
      <div id="head">
          <h2>Scope of the Project</h2>
          <p>
          This website helps to manage inventory efficiently to prevent to keep the shop Functioning all time. it helps to keep track of employees working in the shop. It helps in generating bill easily. It also helps in keeping track of all the users using the system to the admin.
          </p>
      </div>
    </div>
    <?php
     include './includeFiles/footer.html';
    ?>
</body>
</html>