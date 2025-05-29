<?php
    $is_invalid = false;

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $mysqli = require __DIR__ . "/database.php";

        $sql = sprintf("SELECT * FROM user WHERE email = '%s'",
                        $mysqli->real_escape_string($_POST["email"])
                    );

        $result = $mysqli->query($sql);

        $user = $result-> fetch_assoc();
        
        if ($user) {
            if(password_verify($_POST["password"], $user["password_hash"])) {
                session_start();
                $_SESSION["user_id"] = $user["id"];
                header("Location: Homepage.php");
                exit;
            }
        }
        
        $is_invalid = true; 
    }

?>

<html>
    <head>
        <title>
            Log in
        </title>
        <link rel="stylesheet" href="Login.css">
        <link href="https://fonts.googleapis.com/css2?family=Cinzel&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
        </head>
    <body>
        <h1 style="text-align: center;font-size: 50px;">Om Textiles</h1>
        <div class="login">
            <br>
            <h1>Login</h1>

            <form class="center" action="login.php" method="post" novalidate>
                <?php if ($is_invalid): ?>
                    <em style="color: white;">Invalid Login</em>
                <?php endif; ?>
                <div class="input_div">
                    <input placeholder="" class="text_input" type="email" id="email" name="email" value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
                    <label class="text_label" for="email">Email</label>
                </div>
                <div class="input_div">
                    <input placeholder="" class="text_input"  type="password" id="password" name="password">
                    <label class="text_label" for="password">Password</label>
                </div>
                <br>
                <a href="Homepage.php"><button>Login</button></a>
                <br>
                <br>
                <p>Dont have an account? <a href="SignUp.html">Register</a> </p>
            </form>
        </div>
    </body>
</html>