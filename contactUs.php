<?php
include 'functions.php';

$stmt = $dbconnect->prepare('SELECT * FROM user');
$stmt->execute();
$user_info = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<html>

<head>
    <title>
        Contact Us
    </title>
    <link rel="stylesheet" href="contactUs.css">
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
                    <span><?= $num_items_in_cart ?></span>
                </li>
                <li><a href="index.php?page=aboutUs"><i class="fa-thin fa-users-rectangle fa-xl"></i></a></li>
                <li><a href="index.php?page=contactUs"><i class="fa-thin fa-phone fa-xl"></i></a></li>
                <li><a href="index.php?page=Account"><i class="fa-thin fa-circle-user fa-xl"></i></a></li>
            </ul>
        </nav>
    </header>
    <hr>
    <main>
        <h1 style="display: block;font-weight: normal;margin: 0;padding: 40px 0;font-size: 24px;text-align: center;width: 100%;font-family: 'Poppins', sans-serif;">Contact Us</h1>
        <div class="container">
            <div class="contact-box">
                <div class="contact-left">
                    <h3>Sent your request</h3>
                    <form>
                        <div class="input-row">
                            <div class="input-group">
                                <label>
                                    Name
                                </label>
                                <input type="text">
                            </div>
                            <div class="input-group">
                                <label>
                                    Phone
                                </label>
                                <input type="text">
                            </div>
                        </div>
                        <div class="input-row">
                            <div class="input-group">
                                <label>
                                    Email
                                </label>
                                <input type="email">
                            </div>
                            <div class="input-group">
                                <label>
                                    Subject
                                </label>
                                <input type="text">
                            </div>
                        </div>
                        <label>Message</label>
                        <textarea rows="5" placeholder="Your Message..."></textarea>
                        <button type="submit">SEND</button>
                    </form>
                </div>
                <div class="contact-right">
                    <h3>Reach us</h3>
                    <table>
                        <tr>
                            <td>Email</td>
                            <td>contactus@gmail.com</td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td>+91 98624 23289</td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>Vasta Devdi Rd, Surat, <br> Gujarat, 395003</td>
                        </tr>
                    </table>
                </div>
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