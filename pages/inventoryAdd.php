<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/inventoryAdd.css">

</head>

<body>
    <?php
      session_start();
      include './includeFiles/navbar.php';
      include './code/loginCheckCode.php';
    ?>
    
    <div class="container">
        <h2 style="text-align: center; margin-bottom: 8px;">Add an item</h2>
        <?php
         if(isset($_GET['insert']))
         {
             echo '<div id="visible" style="background:rgb(209, 109, 127);"><h1 style="text-align: center; margin-bottom: 8px; color:black;">Success!! Your product has been added..</h1></div>';
         }
        ?>
        
        <form action="./code/inventoryCode.php" method="post">
            
            <label for="upc_code">UPC Code</label>
            <input type="text" name="upc_code" id="upc_code" class="input">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="input">
            <label for="pdate">Purchase Date</label>
            <input type="date" name="pdate" id="pdate" class="input">
            <label for="edate">Expiry Date</label>
            <input type="date" name="edate" id="edate" class="input">
            <label for="price">Price</label>
            <input type="number" name="price" id="price" class="input">
            <label for="quantity">Quantity</label>
            <input type="number" name="quantity" id="quantity" class="input">
            <label for="cpu">Cost per unit</label>
            <input type="number" name="cpu" id="cpu" class="input">
            <label for="unit">Unit</label>
            <select name="unit" id="unit" class="input" placeholder="Select an option">
                <option value="per-piece">per-peice</option>
                <option value="per-kg" selected>per-kg</option>
            </select>
            <input type="submit" value="Add an item" class="btn" name="add">
        </form>
    </div>
    <script src="../script/index.js"></script>

</html>