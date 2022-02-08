<?php
  include "connection.php";
  session_start();
  if(isset($_POST["submit"]))
  {
    //   echo "hello";
      $id= $_SESSION['id'];
      $name=$_POST['name'];
      $email=$_POST['email'];
      $phoneno=$_POST['phoneno'];
      $address=$_POST['address'];
      $password=$_POST['password'];
      $cpassword=$_POST['pasword'];
      $sqll="select * from employee where name='$name'";
      $queryy=mysqli_query($conn,$sqll);
      if(mysqli_num_rows($queryy)>0)
      {
           header("Location: ../empAdd.php?exist=true");
      }
      else
      {
            if($password==$cpassword)
            {
            $hash=password_hash($password,PASSWORD_DEFAULT);
            $sql="INSERT INTO `employee`(`name`, `email`, `phoneno`, `address`, `password`, `addedBy`) VALUES ('$name','$email','$phoneno','$address','$hash','$id')";
            $query=mysqli_query($conn,$sql);
            $sql1="INSERT INTO `login`(`username`, `password`, `email`, `designation`) VALUES ('$name','$hash','$email',3)";
            $query1=mysqli_query($conn,$sql1);
            if($query)
            {
                header("Location: ../empAdd.php?insert=true");
            }
            }
            else
            {
                header("Location: ../empAdd.php?unmatch=true");
            }
      }
      
  }
?>
