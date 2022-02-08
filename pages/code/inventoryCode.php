<?php
session_start();
include "connection.php";
    if(isset($_POST['add']))
    {
        $id=$_SESSION['id'];
        $upc=$_POST['upc_code'];
        $name=$_POST['name'];
        $pdate=$_POST['pdate'];
        $edate=$_POST['edate'];
        $price=$_POST['price'];
        $quantity=$_POST['quantity'];
        $cpu=$_POST['cpu'];
        $unit=$_POST['unit'];
        $sql="INSERT INTO `inventory`(`itemname`, `quantity`, `price`, `purchaseDate`, `expiryDate`, `unit`, `upc_Code`,  `addedBy`) VALUES ('$name','$quantity','$cpu','$pdate','$edate','$unit','$upc','$id')";
        $query=mysqli_query($conn,$sql);
        if($query)
        {
            header("Location: ../inventoryAdd.php?insert=true");
        }

    }
    if(isset($_POST['del_item']))
    {

        $id=$_POST["i_id"];
        $delete="delete from inventory where item_id='$id'";
        $del=mysqli_query($conn,$delete);
        if($del)
        {
            header("Location: ../inventoryDisp.php?delete=true");
        }
        else
        {
            echo "not deleted";
        }
        
    }
    if(isset($_POST['update']))
    {
        $id=$_POST['id'];
         $upc=$_POST['upc_code'];
         $name=$_POST['name'];
         $pdate=$_POST['pdate'];
         $edate=$_POST['edate'];
         $price=$_POST['cpu'];
         $quantity=$_POST['quantity'];
         $unit=$_POST['unit'];
         
         $sql="update inventory set upc_Code='$upc',itemname='$name',quantity='$quantity',price='$price',purchaseDate='$pdate',expiryDate='$edate',unit='$unit' where item_id='$id'";
          //UPDATE `inventory` SET `itemname` = 'Biscuitttttttt', `quantity` = '100' WHERE `inventory`.`item_id` = 1;
         $query=mysqli_query($conn,$sql);
         if($query)
         {
             header("Location: ../inventoryDisp.php?update=true");
         }
    }
?>
