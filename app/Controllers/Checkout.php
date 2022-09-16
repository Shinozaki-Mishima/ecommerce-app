<?php

require_once APP_DIR."Utils/code.precheckout.php";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["remove_from_cart"])){
        // code to remove items from cart
        $cart_object->removeFromCart($_POST["cart_id"], $user_id);
    }
}

$cartDetails = $cart_object->getCartDetails($user_id);
// check to see if info was posted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // check to see if points_used was posted to the server
    if(isset($_POST["points"])){
        // tell the cart obj to set points used
        $cart_object->setPointsUsed($_POST["points"]);
    }
}
$cart_object->calculateTotal();

// foreach ($productDetails as $data) {
//     # code...
// }

// require and load views
require_once APP_DIR."Views/header-1.php";
require_once APP_DIR."Views/includes/alerts.php";
if(empty($cartDetails)){
    $_SESSION["message"] = "Please add atleast 1 product to the cart.";
    header("location: ".BASE_URL."store");
} else {
    require_once APP_DIR."Views/pages/checkout.php";
}
require_once APP_DIR."Views/footer.php";