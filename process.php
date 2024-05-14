<?php include 'dbconnection.php'; 
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $balance=$_POST['balance'];
    $sql = "INSERT INTO nammachennaibank(name,email,balance) VALUES('$name','$email','$balance')";
    if($connection->query($sql) == TRUE)
    {
        echo"<h2> User Created Successfully</h2>";
    }
    else{
        echo"Error".$sql."<br>".$connection->error;
    }
}
?>
<?php include'customerlist.php';?>
