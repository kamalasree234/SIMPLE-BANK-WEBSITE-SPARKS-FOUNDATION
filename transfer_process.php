<html>
    
    <body>
<?php
include 'dbconnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $from = $_POST['from'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $sender_balance_query = "SELECT balance FROM nammachennaibank WHERE id = $from";
    $sender_balance_result = $connection->query($sender_balance_query);
    if ($sender_balance_result->num_rows > 0) {
        $sender_balance_row = $sender_balance_result->fetch_assoc();
        $sender_balance = $sender_balance_row['balance'];
        if ($amount >= $sender_balance && $sender_balance>=1000) {
            echo "<h2>Insufficient balance.</h2>";
            exit();
        }
        else if($from == $to)
        {
            echo "<h2>you cannot transfer to yourself.</h2>";
            exit();
        }
    } else {
        echo "Sender not found.";
        exit();
    }

    $new_sender_balance = $sender_balance - $amount;
    $update_sender_query = "UPDATE nammachennaibank SET balance = $new_sender_balance WHERE id = $from";
    if ($connection->query($update_sender_query) !== TRUE) {
        echo "Error updating sender's balance: " . $connection->error;
        exit();
    }


    $receiver_balance_query = "SELECT balance FROM nammachennaibank WHERE id = $to";
    $receiver_balance_result = $connection->query($receiver_balance_query);
    if ($receiver_balance_result->num_rows > 0) {
        $receiver_balance_row = $receiver_balance_result->fetch_assoc();
        $receiver_balance = $receiver_balance_row['balance'];
        $new_receiver_balance = $receiver_balance + $amount;
        $update_receiver_query = "UPDATE nammachennaibank SET balance = $new_receiver_balance WHERE id = $to";
        if ($connection->query($update_receiver_query) !== TRUE) {
            echo "Error updating receiver's balance: " . $connection->error;
            exit();
        }
    } else {
        echo "Receiver not found.";
        exit();
    }

  
    $date1 = date('Y-m-d H:i:s');
    $insert_transaction_query = "INSERT INTO transactions (sender_id, receiver_id, amount, date1) VALUES ('$from', '$to', '$amount', '$date1')";
    if ($connection->query($insert_transaction_query) !== TRUE) {
        echo "Error inserting transaction record: " . $connection->error;
        exit();
    }

    echo "<h2>Transaction successful.</h2>";
}
?>

<?php include 'transactionhistory.php' ?>
<style>
            body{
                background-color:#caf0f8;
                font-style:bold;
                font-family:'Times New Roman';
                text-align:center;
                font-size:30px;
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

</body>
</html>