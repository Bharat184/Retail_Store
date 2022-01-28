<?php
    session_start();
    include 'connection.php';
    $id=$_GET['id'];
    $sql="select * from inventory where item_id='$id'";
    $query=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($query);
    $name=$row["itemname"];
    $price=$row["price"];
    foreach($_SESSION['cart'] as $key=>$value)
    {
        if($value['name']==$name)
        {
            unset($_SESSION['cart'][$key]);
            $_SESSION['cart']=array_values($_SESSION['cart']);
            echo "<script>alert('item Removed');
        window.location.href='../myCart.php?remove=true&&name=$value[name]';
        </script>";
        }
    }

?>
