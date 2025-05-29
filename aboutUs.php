<?php
include 'functions.php';

$stmt = $dbconnect->prepare('SELECT * FROM user');
$stmt->execute();
$user_info = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<html>

<head>
    <title>
        About Us
    </title>
    <link rel="stylesheet" href="aboutUs.css">
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
        <h1 style="display: block;font-weight: normal;margin: 0;padding: 40px 0;text-align: center;width: 100%;font-family: 'Poppins', sans-serif;">About Us</h1>
        <h2>About Om Textiles:</h2>
        <h3>Welcome to Om Textiles, where fashion is reinvented and style meets tradition. Om Textiles is an organisation created 
            in Surat that makes ethnic Indian clothing and was founded by Mr. Himanshu Patel. We take satisfaction in being a reputable 
            source for fine women's clothing today, including kurtis, dupattas, sarees, and lehenga fabric.</h3>
        <br>
        <h2>Our Story:</h2>
        <h3>Mr. Himanshu Patel's commitment to superior craftsmanship and creative designs has elevated our brand to new heights. 
            With a background deeply rooted in textile manufacturing, he set out on a mission to blend tradition with modernity. 
            Om Textiles was born out of this passion for preserving the rich heritage of Indian textiles and fashion.</h3>
        <br>
        <h2>Our Collections:</h2>
        <h3>We at Om Textiles provide a broad selection of ladies' clothing that highlights the craftsmanship of India's accomplished 
            craftspeople. Our kurtis are the ideal choice for every occasion since they seamlessly combine comfort and sophistication. 
            Our elaborately crafted dupattas give your outfit an extra touch of class. Our assortment provides a wide range of options 
            for individuals seeking for the ideal fabric to make their ideal lehenga.</h3>
        <br>
        <h2>A World of Designs:</h2>
        <h3>Our dedication to provide more than just clothing but a whole universe of designs is what makes us unique. We take pleasure 
            in selecting an extensive range of patterns, hues, and fashions to suit every taste. Our wide variety provides something for 
            everyone, whether you're drawn to the brightness of classic themes or want a contemporary spin.</h3>
        <br>
        <h2>Our Promise:</h2>
        <h3>Quality is the pillar of Om Textiles. Every item in our collection is put through a thorough quality check to guarantee that 
            you only get the finest. Our staff is committed to delivering a flawless shopping experience from selection to delivery because 
            we value client pleasure.</h3>
        <br>
        <h2>Join Our Journey:</h2>
        <h3>We welcome you to go around our website to see how Indian fashion has been beautifully recreated. We are ready to help, whether 
            you are an expert in ethnic clothing or a novice trying to appreciate the grandeur of Indian clothes. Begin your journey of timeless 
            elegance with Om Textiles as we celebrate the beauty of Indian textiles.</h3>
        <br>
        <h3>We appreciate you making Om Textiles your first choice for ladies' clothing. We are eager to assist you and support you on your fashion 
            journey.</h3>
    </main>
    <footer>
        <hr>
        <br>
        <p style="font-family: 'Cinzel', serif;">&copy; 2023, Om textiles</p>
        <br>
    </footer>
</body>

</html>