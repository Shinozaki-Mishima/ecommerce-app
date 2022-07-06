<?php

// required files
require_once APP_DIR . "config/Database.php";
require_once APP_DIR . "Models/Template.php";

// create objects
$db_object = new Database();
$template_object = new Template($db_object);

// server sided codes
$template_object->insert("John", "Doe");
$results = $template_object->select(1, "john");
print_r($results);
$template_object->update(1, "Doe-Johnson");
$template_object->insert("Another name", "Some last name");
$template_object->delete(2);


// required views
require APP_DIR . "Views/pages/Test.php";
