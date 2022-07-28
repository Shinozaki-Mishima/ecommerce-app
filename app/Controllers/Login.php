<?php

// required files
require_once APP_DIR."Config/Database.php";
require_once APP_DIR."Models/User.php";

// create objects
$db_object = new Database();
$user_object = new User($db_object);

if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["login"])){
        
        if($user_object->login($_POST)){
            echo "Login was successful.";
        } else {
            echo "Incorrect Details.";
        }
    }
}

// require and load views
require_once APP_DIR."Views/pages/login.php";