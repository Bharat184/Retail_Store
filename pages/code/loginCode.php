<?php
    include "connection.php";
    session_start();
    if(isset($_POST["submit"]))
    {
      $name=$_POST['name'];
      $password=$_POST['password'];
      if(empty($name))
      {
         header("Location: ../login.php?err=u");
         exit();
      }
      elseif(empty($password))
      {
         header("Location: ../login.php?err=p");
         exit();
      }
      else
      {
        $sql="select * from login where username='$name'";
        $query=mysqli_query($conn,$sql);
        if(mysqli_num_rows($query)>0)
        {
          $row=mysqli_fetch_assoc($query);
          if($row['password']==$password)
          {
            if(isset($_POST["rememberme"]))
            {
              setcookie('username',$name,time()+86400);
              setcookie('password',$password,time()+86400);
            }
            if($row['designation']==1)
            {
              echo "Admin Credentials";
              exit();
            }
            else if($row['designation']==2)
            {
              $sql="select seller_id from seller where name='$name'";
              $query=mysqli_query($conn,$sql);
              while($row=mysqli_fetch_assoc($query))
              {
                $_SESSION['id']=$row["seller_id"];
              }
              $_SESSION['name']=$name;
              header("Location: ../home.php");
              exit();
            }
            else
            {
              $sql1="select emp_id from employee where name='$name'";
              $query1=mysqli_query($conn,$sql1);
              while($row=mysqli_fetch_assoc($query1))
              {
                $_SESSION['id']=$row["emp_id"];
              }
              $_SESSION['name']=$name;
              header("Location: ../inventoryEmp.php");        
              exit();
            }
          }
         else
         {
           echo "Password don't Match";
         }
      }
      else
      {
        echo "Username does not exist";
      }
    }
  }
?>
