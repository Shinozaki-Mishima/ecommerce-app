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
    if(isset($_POST["add_to_cart"])){
        // get user_id 
        require_once APP_DIR."Utils/code.isLoggedIn.php";
        // id comes from details page
        $cart_object->addToCart($user_id, $id, $_POST["cart_quantity"]);

        header("location:".BASE_URL."cart");
    }
}

$productDetails = $product_object->getProductDetails($id);

foreach ($productDetails as $data) {
    # code...
}

// require and load views
require_once APP_DIR."Views/header-1.php";
require_once APP_DIR."Views/pages/details.php";
require_once APP_DIR."Views/includes/slider.php";
require_once APP_DIR."Views/footer.php";