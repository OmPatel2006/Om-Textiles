<?php

    include 'functions.php';

    if (isset($_GET['search_btn'])){
        $search_data = $_GET['search_input'];
        $stmt = $dbconnect->prepare("SELECT * FROM products where product_keywords like '%$search_data%'");
        $stmt->execute();
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
?>


<html>
    <head>
        <title>
            Products
        </title>
        <link rel="stylesheet" href="search_products.css">
        <link rel="stylesheet" href="webfonts_css/all.css">
        <link rel="stylesheet" href="webfonts_css/sharp-light.css">
        <link rel="stylesheet" href="webfonts_css/sharp-regular.css">
        <link rel="stylesheet" href="webfonts_css/sharp-solid.css">
        <link href="https://fonts.googleapis.com/css2?family=Cinzel&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
        <style>

        </style>
    </head>
    <body>
        <header class="navbar">
            <h1 class="logo">Om textiles</h1>
            <nav>
                <ul class="nav_links">
                    <li class="search">
                        <form class="search_form" method="get" action="search_products.php">
                            <input placeholder="Search..." class="search_input" type="search" id="search" name="search_input">
                            <img src="white_searchicon.png" id="icon">
                            <input type="submit" class="searchbtn" value="Search" name="search_btn">
                        </form>
                    </li>
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
            <div class="products content-wrapper">
                <h1 class="searchlabel"><?=$search_data?></h1>
                <div class="products-wrapper">
                    <?php foreach ($products as $product): ?>
                    <a href="index.php?page=product&id=<?=$product['id']?>" class="product">
                        <img src="Product Images/<?=$product['p_img']?>" width="200" height="200" alt="<?=$product['p_name']?>">
                        <span class="p_name"><?=$product['p_name']?></span>
                        <span class="price">
                            &#8377; <?=$product['price']?>
                        </span>
                    </a>
                    <?php endforeach; ?>
                </div>
            </div>
            <br>
        </main>
        <footer>
            <hr>
            <br>
            <p style="font-family: 'Cinzel', serif;">&copy; 2023, Om textiles</p>
            <br>
        </footer>
    </body>
</html>