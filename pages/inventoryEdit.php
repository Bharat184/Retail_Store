<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/inventoryEdit.css">
</head>
<body>
    <?php
      session_start();
      include './code/navbar.php';
      include './code/loginCheckCode.php';
    ?>
    
    <div class="container">
        <h2 style="text-align: center; margin-bottom: 8px;">Add an item</h2>
        <?php
          session_start();
          include 'code/connection.php';
          $id=$_GET['id'];
          $sql="select * from inventory where item_id='$id'";
          $query=mysqli_query($conn,$sql);
         
          while( $row=mysqli_fetch_assoc($query))
          {
              $itemid=$row['item_id'];
              $upc=$row["upc_Code"];
              $name=$row["itemname"];
              $price=$row["price"];
              $quantity=$row["quantity"];
              $unit=$row["unit"];
              $pdate=$row["purchaseDate"];
              $edate=$row["expiryDate"];
          }


        ?>
        <form action="./code/inventoryCode.php" method="post">
            
            <label for="upc_code">UPC Code</label>
            <input type="text" name="upc_code" id="upc_code" value="<?php echo $upc;?>" class="input">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="input" value="<?php echo $name;?>">
            <label for="pdate">Purchase Date</label>
            <input type="date" name="pdate" id="pdate" class="input" value="<?php echo $pdate;?>">
            <label for="edate">Expiry Date</label>
            <input type="date" name="edate" id="edate" class="input" value="<?php echo $edate;?>">
            <label for="quantity">Quantity</label>
            <input type="number" name="quantity" id="quantity" class="input" value="<?php echo $quantity;?>">
            <label for="cpu">Cost per unit</label>
            <input type="number" name="cpu" id="cpu" class="input" value="<?php echo $price;?>">
            <label for="unit">Unit</label>
            <select name="unit" id="unit" class="input" placeholder="Select an option" value="<?php echo $unit;?>">
                <option value="per-piece">per-peice</option>
                <option value="per-kg">per-kg</option>
            </select>
            <input type="hidden" name="id" value="<?php echo $itemid;?>">
            <input type="submit" value="Add an item" class="btn" name="update">
        </form>

    </div>
</body>

</html>