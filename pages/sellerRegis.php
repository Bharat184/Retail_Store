<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/sellerRegis.css">

</head>

<body>
    <div class="container">
        <h2 style="text-align: center; margin-bottom: 8px;">Register With Your Shop</h2>
        <?php
          if(isset($_GET['exist']))
          {
              echo '<div id="visible" style="background:rgb(209, 109, 127);">
              <h1 style="text-align: center; margin-bottom: 8px; color:black;">Username already there.</h1>
              <h4 style="text-align: center; margin-bottom: 8px; color:black;">Try with a different username.</h4>
          </div>';
          }
          if(isset($_GET['unmatch']))
          {
              echo "<script>alert('Password Unmatched..Try again!');</script>";
          }
          if(isset($_GET['insert']))
          {
              echo '<div id="visible" style="background:rgb(209, 109, 127);"><h1 style="text-align: center; margin-bottom: 8px; color:black;">Success!! Login to continue...</h1></div>';
          }
        ?>
        
        <form action="./code/sellerRegis.php" method="post">
            <h3>Personal Details</h3>
            <label for="name">Name</label>
            <input type="text" name="name" id="" class="input">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="input">
            <label for="phoneno">Phone Number</label>
            <input type="number" name="phoneno" id="phoneno" class="input">
            <label for="address">Address</label>
            <textarea name="address" id="address" cols="30" rows="05" class="inputarea"></textarea>
            <h3>Store Details</h3>
            <label for="shopname">Shop Name</label>
            <input type="text" name="shopname" id="shopname" class="input">
            <label for="shopaddress">Shop Address</label>
            <textarea name="shopaddress" id="shopaddress" cols="30" rows="08" class="inputarea"></textarea>
            <h3>Set Your Password</h3>
            <label for="password">Enter your password</label>
            <input type="password" name="password" id="password" class="input">
            <label for="pasword">Re-Enter your Password</label>
            <input type="password" name="pasword" id="pasword" class="input">
             <input type="submit" value="Submit" class="btn" name="submit">
             <a href="login.php" class="btn">Continue with login</a>
        </form>
    </div>
    <script src="../script/index.js"></script>
</body>

</html>