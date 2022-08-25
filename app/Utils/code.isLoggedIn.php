<?php

if (isset($_SESSION["current_user"]["user_id"])) {
    $user_id = $_SESSION["current_user"]["user_id"];
} else {
    header("location:" . BASE_URL . "login");
}