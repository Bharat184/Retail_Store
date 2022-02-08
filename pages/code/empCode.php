<?php
 include 'connection.php';

  if(isset($_GET['edit']))
  {
      echo "got it";
  }

  if(isset($_POST['deleteemp']))
  {

      $name=$_POST["emp_name"];
      $id=$_POST["emp_id"];
      $sql="delete from employee where emp_id='$id'";
      $sql1="delete from login where username='$name'";
      $query1=mysqli_query($conn,$sql1);
      $query=mysqli_query($conn,$sql);
      if($query)
      {
        header("Location: ../empDisp.php?delete=true");
      }
  }
  
  if(isset($_POST['update']))
  {
    $realname=$_POST['realname'];
    $realemail=$_POST['realemail'];
    $name=$_POST['name'];
    $phoneno=$_POST['phoneno'];
    $email=$_POST['email'];
    $address=$_POST['address'];
    $id=$_POST['id'];
    $sql="update employee set name='$name',email='$email',phoneno='$phoneno',address='$address' where emp_id='$id'";
    $query=mysqli_query($conn,$sql);
    if($realname!=$name || $email!=$realemail)
    {
      $sql1="update login set username='$name',email='$email' where username='$realname'";
      $query1=mysqli_query($conn,$sql1);
    }
    if($query)
    {
      header("Location: ../empDisp.php?update=true");
    }
  }
?>
