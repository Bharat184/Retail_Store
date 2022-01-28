<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/aboutUs.css">
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
       
    </div>
    <?php
     include './includeFiles/footer.html';
    ?>
</body>
</html>