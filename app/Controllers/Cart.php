<?php

// required files
require_once APP_DIR."Config/Database.php";
require_once APP_DIR."Models/User.php";
require_once APP_DIR."Models/Product.php";
require_once APP_DIR."Models/Cart.php";

// create objects
$db_object = new Database();
$user_object = new User($db_object);
$product_object = new Product($db_object);
$cart_object = new Cart($db_object);

if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["login"])){
        
    }
}

/*
TOFIX: FOR TESTING PURPOSES:

$cart_object->addToCart(1, 2, 3);
$cart_object->removeFromCart(1, 1);
$cart_object->updateCart(1, 2, 5);
$cart_details = $cart_object->getCartDetails(1);
Debugger::debug($cart_details);
*/


// $productDetails = $product_object->getProductDetails($id);

// foreach ($productDetails as $data) {
//     # code...
// }

// require and load views
require_once APP_DIR."Views/header.php";
require_once APP_DIR."Views/pages/cart.php";
require_once APP_DIR."Views/footer.php";