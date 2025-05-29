<?php

    include 'functions.php';

    if (isset($_GET['id'])) {
        $stmt = $dbconnect->prepare('SELECT * FROM products WHERE id = ?');
        $stmt->execute([$_GET['id']]);
        $product = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$product) {
            exit('Product does not exist!');
        }
    } else {
        exit('Product does not exist!');
    }

?>

<html>
    <head>
        <title>
            Product
        </title>
        <link rel="stylesheet" href="product.css">
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
            <div class="product content-wrapper">
                <img class="productimage" src="Product Images/<?=$product['p_img']?>" alt="<?=$product['p_name']?>">
                <div class="productinfo">
                    <h1 class="p_name"><?=$product['p_name']?></h1>
                    <span class="price">
                        &#8377;<?=$product['price']?>
                    </span>
                    <form action="index.php?page=cart" method="post">
                        <input type="number" name="quantity" value="1" min="1" max="<?=$product['quantity']?>" placeholder="Quantity" required>
                        <input type="hidden" name="product_id" value="<?=$product['id']?>">
                        <input type="submit" value="ADD TO CART">
                    </form>
                    <div class="description">
                        <?=$product['p_description']?>
                    </div>
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