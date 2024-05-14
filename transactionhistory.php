<?php
include 'dbconnection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction History</title>
    <style>
        h2{
                font-style:bold;
                font-family:'Times New Roman';
                text-align:center;
                font-size:30px;
                color:#023e8a;
            }
        body{
            text-align:center;
            background-color:#caf0f8;
            font-size:30px;
            font-family:'Times New Roman';
        }
        table {
            border-collapse: collapse;
            width: 100%;
           background-color: #ffe5ec;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
           
        }
        th {
            background-color:#c8b6ff ;
        }
    </style>
</head>
<body>
    <h2>Transaction History</h2>
    <table>
        <tr>
            <th>Transaction ID</th>
            <th>Sender</th>
            <th>Receiver</th>
            <th>Amount</th>
            <th>Date</th>
        </tr>
        <?php
        $sql = "SELECT * FROM transactions";
        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['sender_id'] ."</td>";
                
                $sender_id = $row['sender_id'];
                $sender_query = "SELECT name FROM nammachennaibank WHERE id = $sender_id";
                $sender_result = $connection->query($sender_query);
                if ($sender_result->num_rows > 0) {
                    $sender_row = $sender_result->fetch_assoc();
                    $sender_name = $sender_row['name'];
                } else {
                    $sender_name = "Unknown";
                }
                echo "<td>" . $sender_name . "</td>";
                
               
                $receiver_id = $row['receiver_id'];
                $receiver_query = "SELECT name FROM nammachennaibank WHERE id = $receiver_id";
                $receiver_result = $connection->query($receiver_query);
                if ($receiver_result->num_rows > 0) {
                    $receiver_row = $receiver_result->fetch_assoc();
                    $receiver_name = $receiver_row['name'];
                } else {
                    $receiver_name = "Unknown";
                }
                echo "<td>" . $receiver_name . "</td>";
                
                echo "<td>" . $row['amount'] . "</td>";
                echo "<td>" . $row['date1'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No transactions found</td></tr>";
        }
        ?>
    </table>
</body>
</html>