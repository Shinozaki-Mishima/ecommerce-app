<?php

// required files
require_once APP_DIR."Config/Database.php";
require_once APP_DIR."Models/User.php";
require_once APP_DIR."Models/Product.php";
require_once APP_DIR."Models/Cart.php";
require_once APP_DIR."Utils/code.isLoggedIn.php";

// create objects
$db_object = new Database();
$user_object = new User($db_object);
$product_object = new Product($db_object);
$cart_object = new Cart($db_object);
