<?php include 'dbconnection.php'; ?>
<html>
    <head>
        <title>View All Customers</title>
        <style>
            body{
                background-color:#caf0f8;
                margin-top:50px;
            }
            h2{
                font-style:bold;
                font-family:'Times New Roman';
                text-align:center;
                font-size:30px;
                color:#023e8a;
            }
        table {
            border-collapse: collapse;
            width: 100%;
            font-family:'Times New Roman';
            background-color:#ffe5ec;
            
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
            font-size:25px;
        }
        th {
            background-color:#c8b6ff ;
            font-size:30px;
        }
    </style>
        <h2>CUSTOMERS</h2>
</head>
<body>
    <table>
        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>E-MAIL ID</th>
            <th>BALANCE</th>
</tr>
        <?php 
        $sql = "SELECT id,name,email,balance from nammachennaibank";
        $result=$connection->query($sql);
        if($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc())
            {
                echo "<tr>";
                echo "<td>".$row['id']."</td>";
                echo "<td><a href='vieweach.php?id=".$row['id']."'>".$row['name']."</a></td>";
                echo"<td>".$row['email']."</td>";
                echo"<td>".$row['balance']."</td>";
               echo"</tr>";
            }
        }
        else{
            echo"<tr><td colspan='4'>No Customers Found</td></tr>";
        }
        ?>
        </table>
    </body>
    </html>