<?php
include 'connection.php';
  if(isset($_GET['edit']))
  {
      echo "got it";
  }
  if(isset($_GET['delete']))
  {
    $id=$_GET['delete'];
    $sql="delete from employee where emp_id='$id'";
    $query=mysqli_query($conn,$sql);
    if($query)
    {
      header("Location: ../empDisp.php?delete=true");
    }
  }
  if(isset($_POST['update']))
  {
    $name=$_POST['name'];
    $email=$_POST['phoneno'];
    $phoneno=$_POST['email'];
    $address=$_POST['address'];
    $id=$_POST['id'];
    $sql="update employee set name='$name',email='$email',phoneno='$phoneno',address='$address' where emp_id='$id'";
    $query=mysqli_query($conn,$sql);
    if($query)
    {
      header("Location: ../empDisp.php?update=true");
    }
  }
?>
