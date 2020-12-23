<?php
session_start();
session_destroy();
include 'koneksi.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
    <div class="w3-display-container" style="height: 500px;">
        <div class="w3-display-middle w3-border">
            <h2 class="w3-center">Login</h2>
            <form class="w3-container" method="POST" action="login_act.php">
                <p>
                <label>Username</label>
                <input type="text" name="user" class="w3-input w3-border" required="">
                </p>
                <p>
                <label>Password</label>
                <input type="password" name="pass" class="w3-input w3-border" required="">
                </p>
                <p>
                <input type="submit" name="login" value="Login" class="w3-btn w3-green">
                </p>
            </form>
            <br>
        </div>        
    </div>

    user1 <br>
    username : user1 <br>
    password : pass1
</body>
</html>