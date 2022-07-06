<?php

session_start();

function get($route, $path_to_include)
{
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        route($route, $path_to_include);
    }
}
function post($route, $path_to_include)
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        route($route, $path_to_include);
    }
}
function put($route, $path_to_include)
{
    if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
        route($route, $path_to_include);
    }
}
function patch($route, $path_to_include)
{
    if ($_SERVER['REQUEST_METHOD'] == 'PATCH') {
        route($route, $path_to_include);
    }
}
function delete($route, $path_to_include)
{
    if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
        route($route, $path_to_include);
    }
}
function any($route, $path_to_include)
{
    route($route, $path_to_include);
}
function route($route, $path_to_include)
{

    // NOTE:[router-debug] Changes to router
    showRouteInfo($route, $path_to_include);
    $route = modifyRoute($route);

    //$ROOT = $_SERVER['DOCUMENT_ROOT']; // <<<<<<<<<<<<<<<<<<< original code
    $ROOT = PROJECT_DIR;
    if ($route == "/404") {
        //include_once("$ROOT/$path_to_include"); // <<<<<<<<<<<<<<<<<<< original code
        include_once($ROOT . $path_to_include);
        exit();
    }
    $request_url = filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL);
    $request_url = rtrim($request_url, '/');
    $request_url = strtok($request_url, '?');
    $route_parts = explode('/', $route);
    $request_url_parts = explode('/', $request_url);
    array_shift($route_parts);
    array_shift($request_url_parts);

    showMoreRouteInfo($request_url, $route_parts, $request_url_parts);

    // Route is /
    if ($route_parts[0] == '' && count($request_url_parts) == $_ENV["DIR_COUNT"]) { // <<<<<<<<<<<< Change 0 to DIR_COUNT / 1
        //include_once("$ROOT/$path_to_include"); // <<<<<<<<<<<<<<<<<<< original code
        include_once($ROOT . $path_to_include);
        exit();
    }
    // Error: Route does not match request url 
    if (count($route_parts) != count($request_url_parts)) {
        return;
    }
    $parameters = [];
    for ($__i__ = 0; $__i__ < count($route_parts); $__i__++) {
        $route_part = $route_parts[$__i__];
        if (preg_match("/^[$]/", $route_part)) {
            $route_part = ltrim($route_part, '$');
            array_push($parameters, $request_url_parts[$__i__]);
            $$route_part = $request_url_parts[$__i__];
        } else if ($route_parts[$__i__] != $request_url_parts[$__i__]) {
            return;
        }
    }

    //include_once("$ROOT/$path_to_include"); // <<<<<<<<<<<<<<<<<<< original code
    include_once($ROOT . $path_to_include);
    exit();
}
function out($text)
{
    echo htmlspecialchars($text);
}
function set_csrf()
{
    if (!isset($_SESSION["csrf"])) {
        $_SESSION["csrf"] = bin2hex(random_bytes(50));
    }
    echo '<input type="hidden" name="csrf" value="' . $_SESSION["csrf"] . '">';
}
function is_csrf_valid()
{
    if (!isset($_SESSION['csrf']) || !isset($_POST['csrf'])) {
        return false;
    }
    if ($_SESSION['csrf'] != $_POST['csrf']) {
        return false;
    }
    return true;
}


/**
 * show route and file to include
 * // NOTE[router-debug]: Show route info
 */
function showRouteInfo($route, $path_to_include)
{
    if (!empty($_ENV["SHOW_ROUTES"])) {
        echo "<h4>Checking route set in index</h4>";
        echo "Original Route: " . $route . "<Br>";
        echo "Modified Route:" . "/" . $_ENV["PROJECT_NAME"] . $route . "<Br>";
        echo "Route in use: ";
        echo ($_ENV["PROJECT_PATH"] != "/" && $route != "/")  ? "Modified " : "Original";
        echo "<br>";
        echo "Example URL: " . ROOT_URL . "<br>";
        echo "Path: " . $path_to_include . "<br>";
    }
}

/**
 * Show route and url parts
 * // NOTE[router-debug]: Router test to determine url parts match route parts
 * 
 */
function showMoreRouteInfo($request_url, $route_parts, $request_url_parts)
{

    if (!empty($_ENV["SHOW_ROUTES"])) {
        echo "<h5>More info</h5>";
        echo "Request URL is " . $request_url . "<br>";
        echo "Route parts (index) : ";
        print_r($route_parts);
        echo "<br>Request url parts: ";
        print_r($request_url_parts);
        echo "<br><br>";
    }
}

/**
 * Modify route to include project name
 * if route == /, return original route
 * if PROJECT_PATH = /, url is should be example.com/
 * if PROJECT_PATH != /, url should be example.com/PROJECT_NAME/
 * // NOTE[router-debug]: Modify route to possibly include project name
 * 
 * @param string $route a string route
 * @return string modified route with or without project name
 */
function modifyRoute($route)
{
    $mod_route = "/" . $_ENV["PROJECT_NAME"] . $route;
    return ($_ENV["PROJECT_PATH"] != "/" && $route != "/") ? $mod_route : $route;
}
