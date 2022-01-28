<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/contact.css">
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
        <h1>Contact us:</h1>
        <div class="box">
            <form action="/" method="post">
                <label for="title">Enter your query</label>
                <input type="text" name="title" id="title" class="input">
                <label for="desc">Describe in details</label>
                <textarea name="desc" id="desc" cols="30" rows="10" class="input"></textarea>
                <input type="submit" value="Submit" class="btn">
            </form>
        </div>
    </div>
    <?php
     include 'includeFiles/footer.html';
    ?>
    
</body>
</html>