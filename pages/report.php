<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/report.css">
    <title>Retail Store</title>
</head>

<body>
    <?php
        session_start();
        include './code/connection.php';
        include './code/loginCheckCode.php';
        $name=$_SESSION['name'];
        $sql="select * from login where username='$name'";
        $query=mysqli_query($conn,$sql);
        $row=mysqli_fetch_assoc($query);
        $des=$row['designation'];
        if($des==2)
        {
            include './includeFiles/navbar.php';
        }
        else
        {
            include './includeFiles/navbarEmp.php';
        }
    ?>
    <div class="container">
        <div class="table" style="overflow-x: auto;">
            <table>
                <thead>
                    <th>Id</th>
                    <th>Customer Name</th>
                    <th>Email</th>
                    <th>Phone No</th>
                    <th>Address</th>
                    <th>Total Amount</th>
                    <th>Date</th>
                </thead>
                <tbody>
                    <?php
                        $name=$_SESSION['name'];
                        $id=$_SESSION['id'];
                        $sql="select * from login where username='$name'";
                        $query=mysqli_query($conn,$sql);
                        $row=mysqli_fetch_assoc($query);
                        $des=$row['designation'];
                        if($des==2)
                        {
                            $sql="select * from ordermanager where soldBy='$id'";
                            $query=mysqli_query($conn,$sql);
                            if($query)
                            {
                                if(mysqli_num_rows($query)>0)
                                {
                                    while($row=mysqli_fetch_assoc($query))
                                    {
                                        echo "<tr><td>$row[order_id]</td><td>$row[name]</td><td>$row[email]</td><td>$row[phoneno]</td><td>$row[address]</td><td class='amount'>$row[tAmount]</td><td>$row[Date]</td></tr>";
                                    }
                                }
                            }

                        }
                        else
                        {
                            $id=$_SESSION['id'];
                            $sql="select * from ordermanager where soldby=(select addedBy from employee where emp_id='$id')";
                            $query=mysqli_query($conn,$sql);
                            if($query)
                            {
                                if(mysqli_num_rows($query)>0)
                                {
                                    while($row=mysqli_fetch_assoc($query))
                                    {
                                        echo "<tr><td>$row[order_id]</td><td>$row[name]</td><td>$row[email]</td><td>$row[phoneno]</td><td>$row[address]</td><td>$row[tAmount]</td><td>$row[Date]</td></tr>";
                                    }
                                }
                            }

                        }
                    ?>
                </tbody>
            </table>
        </div>
        <div id="totalVal"></div>
    </div>
    <?php
      include './includeFiles/footer.html';
    ?>
</body>
<script>
    let amount=document.getElementsByClassName('amount');
    let total=0;
    for(let i=0;i<amount.length;i++)
    {
        total+=parseInt(amount[i].innerText);
    }
    totalVal.innerHTML=`<h1>Total Sales: ${total}</h1>`;
    // console.log(total)
</script>
</html>