<?php

require('./db.php');


 if(isset($_POST['submit'])){
    $uname=$mysql->real_escape_string($_POST['Username']);
    $password= substr(sha1($_POST['password']),0,90);
    $sql="select * from users where user='$uname'";
    $result=$mysql->query($sql);
    if($result->num_rows > 0)
    {
        $result = $result->fetch_assoc();
        if($result['user'] == $uname && $result['upass'] == $password)
        {
            header('Location:'.'star.php');
        }
        else
        {
            echo 'Login Failed';
        }
    }
    else
    {
        echo 'No Such User Exist';
    }
}


?>
<html>
    <head>
        <title> E-learning On Virtual Environment</title>
        <link rel="stylesheet" type="text/css" href="assets/css/Style.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div class="loginbox">
            <img src="avatar.png" class="avatar">
   <form method="POST" action='#'>
            <h1> Login Here </h1>
            <form action="u.php" method="post">
                <p>UserName</p>
                <input type="text" name="Username" placeholder="Enter Username">
                <p>Password</p>
                <input type="password" name="password" placeholder="Enter Password">
                <input type="submit" name="submit" value="Login">
                <a href="#">Lost Your Password</a><br>
                <a href="accounts.php">Don't have an account?</a><br>

            </form>

        </div>
    </body>
</html>
