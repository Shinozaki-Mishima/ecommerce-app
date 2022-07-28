<?php

// CHANGE: Checks config directory and calls debugger.php 

$serverEnv = 0; // set 1 to use .serverEnv or 0 to use default .env
$configDir = dirname(__DIR__, 1) . "/app/Config";
is_dir($configDir) ? true : exit("Invalid Directory: " . $configDir);
require_once $configDir . "/Paths.php";
require_once $configDir . "/Router.php";
require_once $configDir . "/Debugger.php";



get('/home', 'app/Controllers/Homepage.php');

get('/registration', 'app/Controllers/Registration.php');
post('/registration', 'app/Controllers/Registration.php');

get('/login', 'app/Controllers/Login.php');
post('/login', 'app/Controllers/Login.php');

get('/logout', 'app/Controllers/Logout.php');
post('/logout', 'app/Controllers/Logout.php');

// ##################################################
// ##################################################
// ##################################################

// Static GET
// In the URL -> http://localhost
// The output -> Index
// get(PROJECT_FOLDER, 'app/Controllers/Homepage.php');
get('/', 'app/Controllers/Homepage.php');
// get(PROJECT_FOLDER . 'login', 'app/Controllers/Login.php');

echo "<h1>Could not find a route that matches the url provided</h1>";


// Dynamic GET. Example with 1 variable
// The $id will be available in user.php
//get('/user/$id', 'index.php');

// Dynamic GET. Example with 2 variables
// The $name will be available in user.php
// The $last_name will be available in user.php
//get('/user/$name/$last_name', 'user.php');

// Dynamic GET. Example with 2 variables with static
// In the URL -> http://localhost/product/shoes/color/blue
// The $type will be available in product.php
// The $color will be available in product.php
//get('/product/$type/color/:color', 'product.php');

// Dynamic GET. Example with 1 variable and 1 query string
// In the URL -> http://localhost/item/car?price=10
// The $name will be available in items.php which is inside the views folder
//get('/item/$name', 'views/items.php');


// ##################################################
// ##################################################
// ##################################################
// any can be used for GETs or POSTs

// For GET or POST
// The 404.php which is inside the views folder will be called
// The 404.php has access to $_GET and $_POST
any('/404', 'app/views/404.php');
