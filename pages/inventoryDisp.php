<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/inventoryDisp.css">
    <link rel="stylesheet" href="../style/general.css">
</head>
<body>
    <?php
    session_start();
     include 'includeFiles/navbar.php';
     include './code/loginCheckCode.php';
    ?>
    
    <div class="container">
        <div class="table" style="overflow-x: auto;">
          <?php
              if(isset($_GET['delete']))
              {
                  echo "<div id='visible' style='background:rgb(209, 109, 127);'><h1 style='text-align: center; margin-bottom: 8px; color:black;'>Item Deleted</h1></div>";
              }
              if(isset($_GET['update']))
              {
                echo "<div id='visible' style='background:rgb(209, 109, 127);'><h1 style='text-align: center; margin-bottom: 8px; color:black;'>Item Updated Successfully </h1></div>";
              }
          ?>
          
            <table>
                <thead>
                    <th>Sno</th>
                    <th>Upc_Code</th>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Purchase Date</th>
                    <th>Expiry Date</th>
                    <th>Unit</th>
                    <th>Update</th>
                    <th>Delete</th>
                </thead>
                <tbody>
                    <?php
                      include './code/connection.php';
                      $id=$_SESSION['id'];
                      $sql="select * from inventory where addedBy ='$id'";
                      $query=mysqli_query($conn,$sql);
                      $sno=0;
                      while($row=mysqli_fetch_assoc($query))
                      {
                         $sno+=1;
                         echo "<tr>
                         <td>$sno</td>
                         <td>$row[upc_Code]</td>
                         <td>$row[itemname]</td>
                         <td>$row[quantity]</td>
                         <td>$row[price]</td>
                         <td>$row[purchaseDate]</td>
                         <td>$row[expiryDate]</td>
                         <td>$row[unit]</td>
                         <td><a href='inventoryEdit.php?id=$row[item_id]'>Update</a></td>
                         <td>
                         <form action='./code/inventoryCode.php' method='POST'>
                            <input type='hidden' name='i_id' value='$row[item_id]'>
                            <input type='submit' name='del_item' style='display:none;' class='delbtn' >
                         </form>
                         <a href='#' onclick='handleDelete($sno)'>Delete</a>
                         </td>
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
    <script>
        function handleDelete(id)
        {
            if(confirm("Do you want to delete?"))
            { 
                let index=id-1;
                document.getElementsByClassName('delbtn')[index].click();
            }
        }
    </script>
</body>
</html>