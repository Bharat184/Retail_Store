<?php
session_start();
include 'connection.php';
  if(isset($_POST['itemname']))
  {
      foreach ($_SESSION['cart'] as $key => $value) {
        if($value["name"]==$_POST['itemname'])
        {
          $sql="select * from inventory where itemname='$_POST[itemname]'";
          $query=mysqli_query($conn,$sql);
          if($query)
          {
             $row=mysqli_fetch_assoc($query);
             if($_POST['quantity']<=$row['quantity'])
             {
               $_SESSION['cart'][$key]['quantity']=$_POST['quantity'];
               header("Location: ../myCart.php?updt=true");
               exit();
             }
             else
             {
               header("Location: ../myCart.php?low=true && in=$_POST[itemname]");
               exit();
             }
          }

        } 

      }
  }
  if(isset($_POST['buy']))
  {
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phoneno=$_POST['phoneno'];
    $address=$_POST['address'];
    $tamount=$_POST['tamount'];
    // echo $name;
    // echo $address;
    // echo $phoneno;
    // echo $email;
    $empid=$_SESSION['id'];
    $empname=$_SESSION['name'];
    $s="select addedBy from employee where emp_id='$empid'";
    $q=mysqli_query($conn,$s);
    $row=mysqli_fetch_assoc($q);
    $sid=$row['addedBy'];
    $sql="INSERT INTO `ordermanager`(`name`, `email`, `phoneno`, `address`, `tAmount`, `soldBy`, `empInCharge`) VALUES ('$name','$email','$phoneno','$address','$tamount','$sid','$empid')";
    if($query=mysqli_query($conn,$sql))
    {
      $order_id=mysqli_insert_id($conn);
      $sql1="INSERT INTO `orderdetails`(`Order_id`, `item_id`, `price`, `quantity`) VALUES (?,?,?,?)";
      $stmt=mysqli_prepare($conn,$sql1);
      if($stmt)
      {
        mysqli_stmt_bind_param($stmt,"iiii",$order_id,$itemid,$price,$quantity);
        foreach($_SESSION['cart'] as $key => $value)
        {
           $itemid=$value["id"];
           $price=$value["price"]*$value["quantity"];
           $quantity=$value["quantity"];
           echo $price;
           echo "<br>";
           echo $quantity;
           mysqli_stmt_execute($stmt);
           $sql2="update inventory set quantity=(quantity-'$quantity') where item_id='$itemid'";
           mysqli_query($conn,$sql2);
        }
        unset($_SESSION['cart']);
        echo "<script>alert('order successfull');
        window.location.href='../bill.php?id=$order_id';
        </script>";
      }
    }
  }
  // SELECT itemname,name,email,phoneno,address from orderdetails inner join ordermanager on orderdetails.Order_id=ordermanager.order_id inner JOIN inventory on inventory.item_id=orderdetails.Order_id
?>
