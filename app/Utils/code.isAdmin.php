<?php

if (isset($_SESSION["current_user"]["email"])
&& $_SESSION["current_user"]["email"] == $_ENV["ADMIN_EMAIL"]) {
    $user_id = $_SESSION["current_user"]["user_id"];
} else {
    $_SESSION["message"] = "Restricted.";
    header("location:" . BASE_URL . "login");
    exit;
}