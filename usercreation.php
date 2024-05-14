<?php include 'dbconnection.php'; ?>
<html>
    <head>
        <title>Create User</title>
        <h2>Create User</h2></head>
        <style>
                body{
                    text-align:center;
                    background-color:#caf0f8;
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
                .forms{
                    margin-top:5%;
                }
                input[type="text"],
             input[type="email"],input[type="number"],
             textarea{  
                border: 1px solid #ccc;
           border-radius: 3px;
           width:200px;
           height:30px;
        }
            button{
            color:#03045e;
            font-family:'Times New Roman';
            width:200px;
            height:50px;
            font-size:30px;
        } 
       </style> 
        

<body>
    <div class="forms">
<form action="process.php" method="POST">
    <label for ="name">Name:</label>
    <input type="text" id="name" name="name" required><br><br>
    <label for ="email">E-mail:</label>
    <input type="email" id="email" name="email" required><br><br>
    <label for ="balance">Initial Balance:</label>
    <input type="number" id="balance" name="balance" required><br><br>
    <button type="submit">Create User</button>
    </div>
</form>
</body>
</html>