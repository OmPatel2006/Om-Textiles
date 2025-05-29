<?php

    if (empty($_POST["fullname"])){
        die("Full name is required");
    }// Checking if the fullname input is empty or not

    if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        die("Valid email is required");
    }// Checking if the email inputed is valid or not

    if (strlen($_POST["password"])<8) {
        die("Password must be at least 8 characters");
    }// Checking if length of the password is atleast 8 chracters

    if (!preg_match("/[a-z]/i", $_POST["password"])) {
        die("Password must contain at least one letter");
    }// Checking if the password contains atleast one letter

    if (!preg_match("/[0-9]/i", $_POST["password"])) {
        die("Password must contain at least one number");
    }// Checking if the password contains atleast one number

    if ($_POST["password"] !== $_POST["password_confirmation"]) {
        die("Passwords must match");
    }// Checking if the password inputed in the password input and repeat password input match or not

    $password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);   //Encrypting the password entered

    $mysqli = require __DIR__ . "/database.php";

    $sql = "INSERT INTO user (name, email, phone_number, password_hash, password, shippingaddress)
            VALUES (?, ?, ?, ?, ?, ?)";
    
    $stmt = $mysqli->stmt_init();

    if( ! $stmt->prepare($sql)) {
        die("SQL error: " . $mysqli->error);
    }

    $stmt->bind_param("ssssss",
                      $_POST["fullname"],
                      $_POST["email"],
                      $_POST["phone_number"],
                      $password_hash,
                      $_POST["password"],
                      $_POST["shippingaddress"]);
    
    if ($stmt->execute()) {

        header("Location: signup_success.html");
        exit;

    } else {
        
        if ($mysqli->errno === 1062) {
            die("The email has already been taken");
        } else {
            die($mysqli->error . " " . $mysqli->errno);
        }
    }

?>