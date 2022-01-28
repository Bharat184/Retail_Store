<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/empDisp.css">
</head>
<body>
    <?php
     session_start();
     include 'includeFiles/navbar.php';
     include './code/loginCheckCode.php';
    ?>
    
    <div class="container">
        <?php
          if(isset($_GET['delete']))
          {
              echo "<div id='visible' style='background:rgb(209, 109, 127);'><h1 style='text-align: center; margin-bottom: 8px; color:black;'>Employee has been deleted</h1></div>";
          }
          if(isset($_GET['update']))
          {
              echo "<div id='visible' style='background:rgb(209, 109, 127);'><h1 style='text-align: center; margin-bottom: 8px; color:black;'>Record updated successfully.</h1></div>";
          }

        ?>
        
        <div class="table" style="overflow-x: auto;">
            <table>
                <thead>
                    <th>Sno</th>
                    <th>Name</th>
                    <th>Phone No</th>
                    <th>Email</th>
                    <th>Date of Join</th>
                    <th>Address</th>
                    <th>Update</th>
                    <th>Delete</th>
                </thead>
                <tbody>
                    <?php
                    $id=$_SESSION['id'];
                     include 'code/connection.php';
                     $sql="select * from employee where addedBy='$id'";
                     $query=mysqli_query($conn,$sql);
                     while($row=mysqli_fetch_assoc($query))
                     {
                         echo " <tr>
                         <td>1</td>
                         <td>$row[name]</td>
                         <td>$row[phoneno]</td>
                         <td>$row[email]</td>
                         <td>$row[dateOfJoin]</td>
                         <td>$row[address]</td>
                         <td><a href='empEdit.php?id=$row[emp_id]'>Edit</a></td>
                         <td><a href='code/empCode.php?delete=$row[emp_id]'>Delete</a></td>
                     </tr>";
                     }
                    ?>
                    
                   
                </tbody>
            </table>
        </div>
    </div>
    <?php
      include 'includeFiles/footer.html';
    ?>
    <script src="../script/index.js"></script>
</body>
</html>