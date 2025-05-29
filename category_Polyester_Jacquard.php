<?php

    include 'functions.php';
    $stmt = $dbconnect->prepare("SELECT * FROM products where id = 1 OR id = 2 OR id = 6 OR id = 7");
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $total_products = $dbconnect->query('SELECT * FROM products')->rowCount();

?>


<html>
    <head>
        <title>
            Products
        </title>
        <link rel="stylesheet" href="category.css">
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
            <div class="products content-wrapper">
                <h1 class="productslabel">Products</h1>
                <p class="catlabel">Categories</p>
                
                <div class="categories">
                    <a class="cat" href="category_Dupatta_and_kurti_set.php"><button>Dupatta and kurti set</button></a>
                    <a class="cat" href="category_Sarees.php"><button>Sarees</button></a>
                    <a class="cat" href="category_Lehenga_fabric.php"><button>Lehenga fabric</button></a>
                    <a class="cat" href="category_Polyester_Jacquard.php"><button>Polyester Jacquard</button></a>
                    <a class="cat" href="category_Viscose_Jacquard.php"><button>Viscose Jacquard</button></a>
                </div>
                <br>
                <p class="catlabel">Polyester Jacquard</p>
                <p><?=$total_products?> Products</p>
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