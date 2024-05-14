<?php include'dbconnection.php' ; ?>
<html>
    <head>
        <title>View Customer</title>
        <style>
            body{
                text-align:center;
                background-color:#caf0f8;
                font-family:'Times New Roman';
                    font-style:bold;
                    font-size:30px;
            }</style>
        <h2>Customer Details</h2>
</head>
<body>
    <?php if(isset($_GET['id'])){
        $id=$_GET['id'];
        $sql= "SELECT * FROM nammachennaibank WHERE id = $id";
        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo "<p>ID: " . $row['id'] . "</p>";
            echo "<p>Name: " . $row['name'] . "</p>";
            echo "<p>Email: " . $row['email'] . "</p>";
            echo "<p>Balance: " . $row['balance'] . "</p>";
        } else {
            echo "Customer not found";
        }
    } else {
        echo "Invalid request";
    }
    ?>
</body>
</html>
<?php include 'transfer.php';?>
    