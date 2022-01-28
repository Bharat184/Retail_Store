<?php
session_start();
 include './code/connection.php';
 include './code/loginCheckCode.php';
 $id=$_GET['id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/bill.css">
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
        <?php
         $sql="select * from ordermanager where order_id='$id'";
         $query=mysqli_query($conn,$sql);
         $row=mysqli_fetch_assoc($query);
         $name=$row["name"];
         $email=$row["email"];
         $phoneno=$row["phoneno"];
         $address=$row["address"];
        ?>
        
        <h1>Name of the store</h1>
        <label >Bill Id:<?php echo $id;?> </label><br>
        <h3>Name:</h3><span><?php echo $name;?></span><br>
        <h3>Email: </h3><span><?php echo $email;?></span><br>
        <h3>Phone Number:</h3><span><?php echo $phoneno;?></span><br>
        <h3>Address: </h3> <span><?php echo $address;?></span><br>
         <h2>Order Details:</h2>
         <table>
             <thead>
                 <th>S.No</th>
                 <th>Product Name</th>
                 <th>Price</th>
                 <th>Quantity</th>
             </thead>
             <tbody>
                 <?php
                //   $sql="SELECT itemname,name,email,phoneno,address from orderdetails inner join ordermanager on orderdetails.Order_id=ordermanager.order_id inner JOIN inventory on inventory.item_id=orderdetails.Order_id where orderdetails.order_id='$id'";
                  $sql="select i.itemname as itemname,d.price as price,d.quantity as quantity from orderdetails d JOIN ordermanager m on d.Order_id=m.order_id JOIN inventory i on i.item_id=d.item_id WHERE d.Order_id='$id'";
                  $query=mysqli_query($conn,$sql);
                  $total=0;
                  while($row=mysqli_fetch_assoc($query))
                  {
                     echo "<tr>
                         <td>1</td>  
                         <td>$row[itemname]</td> 
                         <td>$row[price]</td>
                         <td>$row[quantity]</td>         
                     </tr>";
                     $total+=$row["price"];
                  }
                 ?>
             </tbody>
         </table>
        <h3 style="margin-left:47vw; margin-top:30px;">Grand total: <?php echo $total;?></h3>
    </div>
    <button onclick="window.print();">Print</button>
</body>
</html>