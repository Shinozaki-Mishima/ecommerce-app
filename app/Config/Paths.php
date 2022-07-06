<?php

/**
 * Load PHPDOTENV
 */
require_once dirname(__DIR__, 2) . '/vendor/autoload.php';



if (empty($serverEnv)) {
    $dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__, 2));
} else {
    $dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__, 2), '.envServer');
}
$dotenv->load();

// get protocol
$protocol = "http://"; //manually set protocol
$protocol = ((!empty($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] != "off") || $_SERVER["SERVER_PORT"] == 443) ? "https://" : "http://";


/**
 * Define Paths
 */
define("ROOT_DIR", $_SERVER["DOCUMENT_ROOT"] . "/"); //htdocs
define("PROJECT_DIR", ROOT_DIR . $_ENV["PROJECT_NAME"] . "/"); //htdocs/FOLDER/
define("APP_DIR", PROJECT_DIR . 'app/'); //htdocs/FOLDER/app
define("ROOT_URL", $protocol . $_SERVER['SERVER_NAME'] . "/"); //http:localhost/
define("BASE_URL", $protocol . $_SERVER['SERVER_NAME'] . $_ENV["PROJECT_PATH"]); // localhost/ OR localhost/FOLDER/

// FIXME: Will it work on a server?
define("ASSETS_URL", BASE_URL . 'public/Assets/');
