<?php
include("connection.php");
  if(isset($_POST["submit"]))
  {
      $name=$_POST['name'];
      $email=$_POST['email'];
      $phoneno=$_POST['phoneno'];
      $address=$_POST['address'];
      $shopname=$_POST['shopname'];
      $shopaddress=$_POST['shopaddress'];
      $password=$_POST['password'];
      $cpassword=$_POST['pasword'];
    //   echo $name,$email,$phoneno,$address,$shopaddress,$shopname,$password,$cpassword;
    $sqll="SELECT * from seller WHERE name='$name'";
    $queryy=mysqli_query($conn,$sqll);
    if(mysqli_num_rows($queryy)>0)
    {
        // echo "already there";
        header("Location: ../sellerRegis.php?exist=true");
    }
    else
    {
        if($password==$cpassword)
         {
            $sql="INSERT INTO `seller`(`name`, `email`, `phoneno`, `address`, `shopname`, `shopaddress`, `password`) VALUES ('$name','$email','$phoneno','$address','$shopname','$shopaddress','$password')";

            $sql1="INSERT INTO `login`(`username`, `password`, `email`, `designation`) VALUES ('$name','$password','$email',2)";
            $query2=mysqli_query($conn,$sql1);
            
            $query=mysqli_query($conn,$sql);
            if($query && $query2)
            {
                // echo "Data Inserted";
                header("Location: ../sellerRegis.php?insert=true");
            }
            else
            {
                echo "Not Inserted";
                echo $mysqli->error;
            }
         }
        else
         {
          header("Location: ../sellerRegis.php?unmatch=true");
         }
    }
    
  }
?>