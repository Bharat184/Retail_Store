<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    
    <?php
    session_start();
      if(isset($_SESSION['id']))
      {
          header("Location: pages/home.php");
      }
      else
      {
         header("Location: pages/login.php");
      }
    ?>
    
</body>
</html>
