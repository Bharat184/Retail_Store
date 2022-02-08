<?php 
 include 'connection.php';
 if(!isset($_SESSION['name']) || !isset($_SESSION['id']))
 {
    header("Location: ./login.php");
 }
 else
 {
    $name=$_SESSION['name'];
    $id=$_SESSION['id'];
    $sql="select * from login where username='$name'";
    $query=mysqli_query($conn,$sql);
    if(mysqli_num_rows($query)>0)
    {
      while($row=mysqli_fetch_assoc($query))
      {
         if($row["designation"]==2)
         {
           
            $sql="select name from seller where seller_id='$id'";
            $query=mysqli_query($conn,$sql);
            if(mysqli_num_rows($query)>0)
            {
               while($row=mysqli_fetch_assoc($query))
               {
                  if($row['name']!=$name)
                  {
                      header("Location: ./login.php");
                  }
               }
            }
            else
            {
               header("Location: ./login.php");
            }

         }
         else if($row["designation"]==3)
         {
            $sql="select name from employee where emp_id='$id'";
            $query=mysqli_query($conn,$sql);
            if(mysqli_num_rows($query)>0)
            {
               while($row=mysqli_fetch_assoc($query))
               {
                  if($row['name']!=$name)
                  {
                      header("Location: ./login.php");
                  }
               }
            }
            else
            {
               header("Location: ./login.php");
            }
         }
      }
    }
    else
    {
      header("Location: ./login.php");
    }
    
 }
?>