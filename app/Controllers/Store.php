<?php

// required files
require_once APP_DIR."Config/Database.php";
require_once APP_DIR."Models/User.php";
require_once APP_DIR."Models/Product.php";

// create objects
$db_object = new Database();
$user_object = new User($db_object);
$product_object = new Product($db_object);

if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["login"])){
        
    }
}

// Debugger::debug($_GET);

if($_SERVER["REQUEST_METHOD"] == "GET") {
    if(!empty($_GET)){
        $productDetails = $product_object->filterProducts($_GET);
    } else {
        $productDetails = $product_object->getAllProducts();
    }
}

// require and load views
require_once APP_DIR."Views/header-1.php";
require_once APP_DIR."Views/includes/alerts.php";

if(empty($productDetails)) {
    require_once APP_DIR."Views/includes/search-no-results.php";
} else {
    require_once APP_DIR."Views/pages/store-1.php";
}

require_once APP_DIR."Views/includes/chatbot.php";
require_once APP_DIR."Views/footer.php";