<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/navbar.css">
    <script src="https://kit.fontawesome.com/b6b1bda44f.js" crossorigin="anonymous"></script>
    <title>Retail Store</title>
</head>

<body>
    <nav>
        <div id="logo">Retail Store</div>
        <input type="checkbox" name="" id="check">
        <label for="check" class="menubutton">
            <i class="fas fa-align-justify"></i>
        </label>
        <div class="navright">
            <ul>
                <li><a href="home.php">HOME</a></li>
                <li><a href="empDisp.php">EMPLOYEE</a></li>
                <li><a href="inventoryDisp.php">INVENTORY</a></li>
                <li><a href="contact.php">CONTACT US</a></li>
                <li><a href="aboutUs.php">ABOUT US</a></li>
            </ul>
            <div id="user">
                <?php
                    if(isset($_SESSION["name"]))
                    {
                    echo "<span>Welcome: </span> <b>$_SESSION[name]</b>
                    <form action='./code/logout.php' method='post'>
                        <button type='submit' name='clear_session'>Log Out</button>
                    </form>";
                    }
                ?>
            </div>
        </div>
    </nav>
</body>
</html>
