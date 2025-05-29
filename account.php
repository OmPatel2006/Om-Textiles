<?php
    include 'functions.php';

    $stmt = $dbconnect->prepare('SELECT * FROM user');
    $stmt->execute();
    $user_info = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<html>
    <head>
        <title>
            Account
        </title>
        <link rel="stylesheet" href="account.css">
        <link rel="stylesheet" href="webfonts_css/all.css">
        <link rel="stylesheet" href="webfonts_css/sharp-light.css">
        <link rel="stylesheet" href="webfonts_css/sharp-regular.css">
        <link rel="stylesheet" href="webfonts_css/sharp-solid.css">
        <link href="https://fonts.googleapis.com/css2?family=Cinzel&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    </head>
    <body>
        <header class="navbar">
            <h1 class="logo">Om textiles</h1>
            <nav>
                <ul class="nav_links">
                    <li><a href="index.php?page=Homepage"><i class="fa-thin fa-house fa-xl"></i></a></li>
                    <li><a href="index.php?page=products"><i class="fa-thin fa-clothes-hanger fa-xl"></i></a></li>
                    <li>
                        <a href="index.php?page=cart"><i class="fa-thin fa-cart-shopping fa-xl"></i></a>
                        <span><?=$num_items_in_cart?></span>
                    </li>
                    <li><a href="index.php?page=aboutUs"><i class="fa-thin fa-users-rectangle fa-xl"></i></a></li>
                    <li><a href="index.php?page=contactUs"><i class="fa-thin fa-phone fa-xl"></i></a></li>
                    <li><a href="index.php?page=Account"><i class="fa-thin fa-circle-user fa-xl"></i></a></li>
                </ul>
            </nav>
        </header>
        <hr>
        <main>
            <h1 style="display: block;font-weight: normal;padding: 30px 0 20px;font-size: 30px;text-align: center;width: 100%;font-family: 'Poppins', sans-serif;">Account</h1>
            <div class="account">
                <div class="name">
                    <?php foreach ($user_info as $user): ?>
                        <label class="text_label" for="fullname">Full Name</label>
                        <p><?=$user['name']?></p>
                    <?php endforeach; ?>
                </div>
                <br>
                <div class="email">
                    <?php foreach ($user_info as $user): ?>
                        <label class="text_label" for="email">Email</label>
                        <p><?=$user['email']?></p>
                    <?php endforeach; ?>
                </div>
                <br>
                <div class="phone_number">
                    <?php foreach ($user_info as $user): ?>
                        <label class="text_label" for="phone_number">Phone number</label>
                        <p><?=$user['phone_number']?></p>
                    <?php endforeach; ?>
                </div>
                <br>
                <div class="shippingaddress">
                    <?php foreach ($user_info as $user): ?>
                        <label class="text_label" for="shippingaddress">Shipping Address</label>
                        <p><?=$user['shippingaddress']?></p>
                    <?php endforeach; ?>
                </div>
                <br>
                <div class="logout">
                    <a href="Logout.php"><button>Log out</button></a>
                </div>
            </div>

        </main>
        <footer>
            <hr>
            <br>
            <p style="font-family: 'Cinzel', serif;">&copy; 2023, Om textiles</p>
            <br>
        </footer>
    </body>
</html>
