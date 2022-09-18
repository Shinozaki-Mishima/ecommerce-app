<?php

require_once APP_DIR."Config/Database.php";
require_once APP_DIR."Models/User.php";
require_once APP_DIR."Models/Product.php";


$db_object = new Database();
$user_object = new User($db_object);
$product_object = new Product($db_object);

// required views
require_once APP_DIR."Views/header-1.php";
require_once APP_DIR."Views/includes/random-products.php";
require_once APP_DIR."Views/includes/latest-products.php";
require_once APP_DIR."Views/includes/chatbot.php";
require_once APP_DIR."Views/footer.php";