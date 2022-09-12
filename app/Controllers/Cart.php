<?php

require_once APP_DIR."Utils/code.precheckout.php";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["remove_from_cart"])){
        // code to remove items from cart
        $cart_object->removeFromCart($_POST["cart_id"], $user_id);
    }
}

/*
TOFIX: FOR TESTING PURPOSES!!!!:

$cart_object->addToCart(1, 2, 3);
$cart_object->removeFromCart(1, 1);
$cart_object->updateCart(1, 2, 5);
$cart_details = $cart_object->getCartDetails(1);
Debugger::debug($cart_details);
*/
$cartDetails = $cart_object->getCartDetails($user_id);
$cart_object->calculateTotal();


// foreach ($productDetails as $data) {
//     # code...
// }

// require and load views
require_once APP_DIR."Views/header-1.php";
if(empty($cartDetails)) {
    require_once APP_DIR."Views/includes/cart-empty.php";
} else {
    require_once APP_DIR."Views/pages/cart.php";
}

require_once APP_DIR."Views/footer.php";