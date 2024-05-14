<?php include 'dbconnection.php'; ?>

<html lang="en">
<head>
    <title>Transfer Money</title>
    <style>
       body{        
                    text-align:center;
                    background-color:#caf0f8;
                }
                .transf{
                    margin-top:5%;
                }
                h2{
                    font-family:'Times New Roman';
                    font-style:bold;
                    font-size:30px;
                    color:#03045e;
                    text-align:center;
                }
                label{
                   
                    color:#03045e;
                    font-size:30px;
                    font-family:'Times New Roman';
                } 
               input[type="number"],
             textarea{  
                border: 1px solid #ccc;
           border-radius: 3px;
           width:200px;
           height:30px;
        }
        select{
            border: 1px solid #ccc;
           border-radius: 3px;
           width:200px;
           height:30px;
           font-family:'Times New Roman';
            font-size:20px;
        }
        option{ 
            font-family:'Times New Roman';
            font-size:20px;
        }
            button{
            color:#03045e;
            font-family:'Times New Roman';
            width:200px;
            height:50px;
            font-size:30px;
        } 
        </style>
</head>
<body>
    <h2>Transfer Money</h2>
   <div class="transf">
    <form action="transfer_process.php" method="POST">
        <label for="from">From:</label>
        <select id="from" name="from" required>
            <?php
            $sql = "SELECT id, name FROM nammachennaibank";
            $result = $connection->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                }
            } else {
                echo "<option value=''>No customers found</option>";
            }
            ?>
        </select><br><br>
        <label for="to">To:</label>
        <select id="to" name="to" required>
            <?php
            $result = $connection->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                }
            } else {
                echo "<option value=''>No customers found</option>";
            }
            ?>
        </select><br><br>
        <label for="amount">Amount:</label>
        <input type="number" id="amount" name="amount" required><br><br>
        <button type="submit">Transfer</button>
        </div>
    </form>
</body>
</html>