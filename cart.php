<?php
    include 'functions.php';

    if (isset($_POST['product_id'], $_POST['quantity']) && is_numeric($_POST['product_id']) && is_numeric($_POST['quantity'])) {
        $product_id = (int)$_POST['product_id'];
        $quantity = (int)$_POST['quantity'];
        $stmt = $dbconnect->prepare('SELECT * FROM products WHERE id = ?');
        $stmt->execute([$_POST['product_id']]);
        $product = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($product && $quantity > 0) {
            if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
                if (array_key_exists($product_id, $_SESSION['cart'])) {
                    $_SESSION['cart'][$product_id] += $quantity;
                } else {
                    $_SESSION['cart'][$product_id] = $quantity;
                }
            } else {
                $_SESSION['cart'] = array($product_id => $quantity);
            }
        }
        header('location: index.php?page=cart');
        exit;
    }

    if (isset($_GET['remove']) && is_numeric($_GET['remove']) && isset($_SESSION['cart']) && isset($_SESSION['cart'][$_GET['remove']])) {
        unset($_SESSION['cart'][$_GET['remove']]);
    }

    if (isset($_POST['update']) && isset($_SESSION['cart'])) {
        foreach ($_POST as $k => $v) {
            if (strpos($k, 'quantity') !== false && is_numeric($v)) {
                $id = str_replace('quantity-', '', $k);
                $quantity = (int)$v;
                if (is_numeric($id) && isset($_SESSION['cart'][$id]) && $quantity > 0) {
                    $_SESSION['cart'][$id] = $quantity;
                }
            }
        }
        header('location: index.php?page=cart');
        exit;
    }

    if (isset($_POST['placeorder']) && isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        header('Location: placeorder.php');
        exit;
    }

    if (isset($_POST['emptycart']) && isset($_SESSION['cart'])) {
        unset($_SESSION['cart']);
        header('location: index.php?page=cart');
        exit;
    }

    $products_in_cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
    $products = array();
    $subtotal = 0.00;

    if ($products_in_cart) {
        $array_to_question_marks = implode(',', array_fill(0, count($products_in_cart), '?'));
        $stmt = $dbconnect->prepare('SELECT * FROM products WHERE id IN (' . $array_to_question_marks . ')');
        $stmt->execute(array_keys($products_in_cart));
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($products as $product) {
            $subtotal += (float)$product['price'] * (int)$products_in_cart[$product['id']];
        }
    }

?>

<html>
    <head>
        <title>
            cart
        </title>
        <link rel="stylesheet" href="cart.css">
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
            <div class="cart content-wrapper">
                <h1 style="display: block;font-weight: normal;margin: 0;padding: 40px 0;font-size: 24px;text-align: center;width: 100%;font-family: 'Poppins', sans-serif;">Cart</h1>
                <form action="index.php?page=cart" method="post">
                    <table>
                        <thead>
                            <tr>
                                <td colspan="2">Product</td>
                                <td>Price</td>
                                <td>Quantity</td>
                                <td>Total</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($products)): ?>
                            <tr>
                                <td colspan="5" style="text-align:center;">You have no products added in your Shopping Cart</td>
                            </tr>
                            <?php else: ?>
                            <?php foreach ($products as $product): ?>
                            <tr>
                                <td class="img">
                                    <a href="index.php?page=product&id=<?=$product['id']?>">
                                        <img src="Product Images/<?=$product['p_img']?>" width="50" height="50" alt="<?=$product['p_name']?>">
                                    </a>
                                </td>
                                <td>
                                    <a href="index.php?page=product&id=<?=$product['id']?>"><?=$product['p_name']?></a>
                                    <br>
                                    <a href="index.php?page=cart&remove=<?=$product['id']?>" class="remove">Remove</a>
                                </td>
                                <td class="price">&#8377;<?=$product['price']?></td>
                                <td class="quantity">
                                    <div class="quantity-wrapper">
                                        <!-- <script src="Script.js"></script> -->
                                        <!-- <button onclick="increment(this)" class="plusminusbtn" id="decrement">-</button> -->
                                        <input type="number" class="quantityinput" id="inputquantity" name="quantity-<?=$product['id']?>" value="<?=$products_in_cart[$product['id']]?>" min="1" max="<?=$product['quantity']?>" step="1" placeholder="Quantity" required>
                                        <!-- <button onclick="decrement(this)" class="plusminusbtn" id="increment">+</button> -->
                                    </div>
                                </td>
                                <td class="price">&#8377;<?=$product['price'] * $products_in_cart[$product['id']]?></td>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                    <div class="subtotal">
                        <span class="text">Subtotal</span>
                        <span class="price">&#8377;<?=$subtotal?></span>
                    </div>
                    <div class="buttons">
                        <input type="submit" value="Empty Cart" name="emptycart">
                        <input type="submit" value="Update" name="update">
                        <input type="submit" value="Place Order" name="placeorder">
                    </div>
                </form>
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
