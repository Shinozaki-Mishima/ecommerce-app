<?php

// required files
require_once APP_DIR."Config/Database.php";
require_once APP_DIR."Models/User.php";

// create objects
$db_object = new Database();
$user_object = new User($db_object);

if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["registration"])){
        $user_object->register($_POST);
        $_SESSION["message"] = "Registration was successful.";
        header("location: ".BASE_URL."login");
        exit;
    }
}

// require and load views
require_once APP_DIR."Views/header-1.php";
require_once APP_DIR."Views/includes/alerts.php";
require_once APP_DIR."Views/pages/registration-1.php";
require_once APP_DIR."Views/footer.php";