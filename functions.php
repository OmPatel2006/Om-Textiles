<?php
    function cart_db_connect() {
        $DATABASE_HOST = 'localhost';
        $DATABASE_USER = 'root';
        $DATABASE_PASS = '';
        $DATABASE_NAME = 'omtextiles';
        try {
            return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
        } catch (PDOException $exception) {
            exit('Failed to connect to database!');
        }
    }

    $dbconnect = cart_db_connect();

    $num_items_in_cart = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
?>