<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/empEdit.css">

</head>

<body>
    <?php
       session_start();
       include './includeFiles/navbar.php';
       include './code/loginCheckCode.php';
    ?>
    
    <div class="container">
        <h2 style="text-align: center; margin-bottom: 8px;">Add an employee</h2>
        <?php
        include 'code/connection.php';
         $id=$_GET['id'];
         $sql="select * from employee where emp_id='$id'";
         $query=mysqli_query($conn,$sql);
         while($row=mysqli_fetch_assoc($query))
         {
             $name=$row["name"];
             $email=$row["email"];
             $phoneno=$row["phoneno"];
             $address=$row["address"];
             $id=$row["emp_id"];
         }
        ?>
        
        <form action="code/empCode.php" method="post">
            <h3>Personal Details</h3>
            <label for="name">Name</label>
            <input type="text" name="name" id="" class="input" value="<?php echo $name;?>">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="input" value="<?php echo $email;?>">
            <label for="phoneno">Phone Number</label>
            <input type="number" name="phoneno" id="phoneno" class="input" value="<?php echo $phoneno;?>">
            <label for="address">Address</label>
            <textarea name="address" id="address" cols="30" rows="05" class="inputarea"><?php echo $address;?></textarea>
            <input type="hidden" name="id" value="<?php echo $id;?>">
             <input type="submit" value="Submit" class="btn" name="update">
        </form>
    </div>
</body>

</html>