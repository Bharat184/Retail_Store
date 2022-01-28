<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/inventoryEmp.css">
</head>
<body>
    <?php
     session_start();
     include './includeFiles/navbarEmp.php';
     include 'code/connection.php';
     include './code/loginCheckCode.php';
     if(isset($_GET['low']))
      {
          echo "<div id='visible' style='background:rgb(209, 109, 127);'><h1 style='text-align: center; margin-bottom: 8px; color:black;'> $_GET[name] is low in quantity.</h1></div>";
      }
      if(isset($_GET['add']))
      {
          echo "<div id='visible' style='background:rgb(209, 109, 127);'><h1 style='text-align: center; margin-bottom: 8px; color:black;'> $_GET[name] added to cart.</h1></div>";
      }
    ?>
    
    <div class="container">
        <div class="table" style="overflow-x: auto;">
            <table>
                <thead>
                    <th>S.No</th>
                    <th>Item Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Purchase Date</th>
                    <th>Expiry Date</th>
                    <th>Unit</th>
                    <th>Upc Code</th>
                    <th>Add to cart</th>
                </thead>
                <tbody>
                    <?php
                      $id=$_SESSION['id'];
                      $sql="select * from inventory where addedBy=(select addedBy from employee where emp_id='$id')";
                      $query=mysqli_query($conn,$sql);
                      while($row=mysqli_fetch_assoc($query))
                      {
                          echo "<tr>
                              <td>1</td>
                              <td>$row[itemname]</td>
                              <td>$row[quantity]</td>
                              <td>$row[price]</td>
                              <td>$row[purchaseDate]</td>
                              <td>$row[expiryDate]</td>
                              <td>$row[unit]</td>                         
                              <td>$row[upc_Code]</td>
                              <td>
                                <form action='./code/manageCart.php' method='POST'>
                                  <input type='number' name='quantity' min='1' max='100' value='1'>
                                  <input type='hidden' name='id' value='$row[item_id]'>
                                  <input type='submit' value='Add to cart' name='add'>
                                </form>
                              </td>
                          </tr>";
                      }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php
      include './includeFiles/footer.html';
    ?>
    
    <script src="../script/index.js"></script>
</body>
</html>