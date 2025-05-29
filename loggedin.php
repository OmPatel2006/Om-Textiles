<?php
    session_start();
?>

<html>
    <head>
        <title>
            loggedin
        </title>
        <link rel="stylesheet" href="Login.css">
        <link href="https://fonts.googleapis.com/css2?family=Cinzel&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
        </head>
    <body>
        <h1 style="text-align: center;font-size: 50px;">Om Textiles</h1>
        <br>
        <h1 style="font-family: 'Poppins', sans-serif;" >Logged in</h1>
        <?php if (isset($_SESSION["user_id"])): ?>
            <p>You are logged in.</p>
        <?php else: ?>
            <p><a href="login.php">login</a> or <a href="SignUp.html">sign up</a></p>
        <?php endif; ?>
    </body>
</html>