<?php
session_start();
include 'connection.php';
  if(isset($_POST['add']))
  {
    $quantity=$_POST['quantity'];
    $id=$_POST['id'];
    $sql="select * from inventory where item_id='$id'";
    $query=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($query);
    if($row["quantity"]<$quantity)
    {
      header("Location: ../inventoryEmp.php?low=true&&name=$row[itemname]");
      exit();
    }
    else
    {
      $id=$row['item_id'];
      $name=$row['itemname'];
      $price=$row['price'];
      if(isset($_SESSION['cart']))
      {
          // print_r($_SESSION['cart']);
          $myitems=array_column($_SESSION['cart'],'name');
          if(in_array($name,$myitems))
          {
              echo "<script>alert('Item already there');
              window.location.href='../inventoryEmp.php';
              </script>
              ";
          }
          else
          {
              $count=count($_SESSION['cart']);
              $_SESSION['cart'][$count]=array('id'=>"$id",'name'=>"$name",'price'=>"$price",'quantity'=>"$quantity");
              echo "<script>alert('item Added');
              window.location.href='../inventoryEmp.php?add=true&&name=$name';
              </script>";
          }
      }
      else
      {
          $_SESSION['cart'][0]=array('id'=>"$id",'name'=>"$name",'price'=>"$price",'quantity'=>"$quantity");
          echo "<script>alert('item Added');
          window.location.href='../inventoryEmp.php?add=true&&name=$name';
          </script>";
      }
    }
    
  }
?>