<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/login.css">
</head>
<body>  
    <div class="container">
        <div class="box">
            <h3 class="t-center">Retail Store Management</h3>
            
            <?php
               if(isset($_GET['err']))
               {
                if($_GET['err']=='u')
                {
                   echo "<h4 class='input' style='text-align:center; background:green; font-size:20px;'>Username Required.<h4>";
                }
                if($_GET['err']=='p')
                {
                   echo "<h4 class='input' style='text-align:center; background:green; font-size:20px;'>Password Required.<h4>";
                }
                if($_GET['err']=='invalid')
                {
                   echo "<h4 class='input' style='text-align:center; background:green; font-size:20px;'>Invalid Credentials.<h4>";
                }
                if($_GET['err']=='account')
                {
                   echo "<h4 class='input' style='text-align:center; background:green; font-size:20px;'>Account don't exists.<h4>";
                }
               }
            ?>
            
            <form action="code/loginCode.php" method="POST">
                <input type="text" name="name" id="" class="input" placeholder="Enter Your Username" >
                <input type="password" name="password" id="" class="input" placeholder="Enter Your Password">
                <input type="checkbox" name="rememberme" id="checkbox" > &nbsp; &nbsp;<span>Remember Me</span>
                <input type="submit" value="Submit" class="btn" name="submit">
                <a href="sellerRegis.php">Create an account</a>
            </form>
        </div>
    </div>
    <script>
        setTimeout(() => {
            console.log("hello");
            let msg=document.querySelector('h4');
            if(msg)
            {
                msg.style.display='none';
            }
        }, 3000);
    </script>
</body>
</html>

