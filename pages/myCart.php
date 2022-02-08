<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/myCart.css">
    <link rel="stylesheet" href="../style/general.css">
</head>

<body>
    <?php
      session_start();
      include './includeFiles/navbarEmp.php';
     include './code/loginCheckCode.php';
      // unset($_SESSION['cart']);
      if(isset($_SESSION['cart']))
      {
        $count=count($_SESSION['cart']);
        if($count==0)
        {
          unset($_SESSION['cart']);
        }
      }
    ?>
    <?php
      if(isset($_GET['updt']))
      {
          echo "<div id='visible' style='background:rgb(209, 109, 127);'><h1 style='text-align: center; margin-bottom: 8px; color:black;'>Cart Updated.</h1></div>";
      }
      if(isset($_GET['low']))
      {
          echo "<div id='visible' style='background:rgb(209, 109, 127);'><h1 style='text-align: center; margin-bottom: 8px; color:black;'>$_GET[in] is low in quantity.</h1></div>";
      }
      if(isset($_GET['remove']))
      {
          echo "<div id='visible' style='background:rgb(209, 109, 127);'><h1 style='text-align: center; margin-bottom: 8px; color:black;'>$_GET[name] removed from cart.</h1></div>";
      }
    ?>

    <div class="container">
        <h1 style="text-align: center;">My Cart(<?php if(isset($_SESSION['cart'])){echo $count;}?>)</h1>
        <div class="table" style="overflow-x: auto;">
            <table>
                <thead>
                    <th>S.No</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Sub Total</th>
                </thead>
                <tbody>
                    <?php
                    $sno=1;
                       if(isset($_SESSION['cart']))
                       {
                          foreach($_SESSION['cart'] as $key=>$value)
                          {
                            //   $sum=$value["price"]*$value["quantity"];
                              echo "<tr>
                                 <td>$sno</td>
                                 <td>$value[name]</td>
                                 <td>$value[price]<input type='hidden' value='$value[price]' class='iprice'></td>
                                 <td>
                                   <form action='./code/myCartCode.php' method='post'>
                                     <input type='number' name='quantity' class='iquantity' value='$value[quantity]' onchange='this.form.submit()' min='1'>
                                     <input type='hidden' name='itemname' value='$value[name]'>
                                   </form>
                                 </td>
                                 <td class='itotal'></td>
                                 <td><a href='./code/removeCart.php?id=$value[id]'>Remove</a></td>
                              </tr>";
                              $sno+=1;
                          }
                       }
                    ?>

                </tbody>
            </table>
            <div style="margin:10px 5px; font-size:20px;">
              <p style="display:inline-block;">Total:  </p> <span id="total"></span>
            </div>
        </div>
        <h2 class='t-center'>Customer Details</h2>
        <?php
           if(isset($_SESSION['cart']))
           {
             echo '<div style="padding:2px 40px;"><form action="code/myCartCode.php" method="post">
             <label for="name">Name</label>
             <input type="text" name="name" id="name" class="input">
             <label for="email">Email</label>
             <input type="email" name="email" id="email" class="input">
             <label for="phoneno">Phone Number</label>
             <input type="number" name="phoneno" id="phoneno" class="input">
             <label for="address">Address</label>
             <textarea name="address" id="address" cols="30" rows="10" class="txtarea"></textarea>
             <input type="hidden" name="tamount" id="totall">
             <button type="submit" class="btn" name="buy">Submit</button>
    
            </form></div>';
           }
           else
           {
             echo "<h1 style='text-align:center; margin-top:40px; background-color:green;'>Cart Empty</h1>";
           }
        ?>

    </div>
    <?php
      include './includeFiles/footer.html';
    ?>
    
    <script src="../script/index.js"></script>
</body>

</html>