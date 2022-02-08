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
    <link rel="stylesheet" href="../style/orderDetail.css">
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
        <h2>Details of Order Id: <?php
          echo $_GET['id'];
        ?>
        </h2>
        <table>
            <thead>
                <th>S.No</th>
                <th>Item Name</th>
                <th>Quantity</th>
                <th>Price</th>
            </thead>
            <tbody>
               <?php
                    $id=$_GET['id'];
                    $sql="SELECT o.Order_id,i.itemname,o.price,o.quantity from orderdetails o inner JOIN inventory i on o.item_id=i.item_id WHERE o.Order_id='$id'";
                    $query=mysqli_query($conn,$sql);
                    $sno=1;
                    while($row=mysqli_fetch_assoc($query))
                    {
                        echo "<tr>
                        <td>$sno</td>
                        <td>$row[itemname]</td>
                        <td>$row[quantity]</td>
                        <td>$row[price]</td>
                        </tr>";
                        $sno+=1;
                    }
               ?>
            </tbody>
        </table>
    </div>
    <?php
      include './includeFiles/footer.html';
    ?>
</body>
</html>