<?php

// required files
require_once APP_DIR."Config/Database.php";
require_once APP_DIR."Models/User.php";
require_once APP_DIR."Models/Product.php";
require_once APP_DIR."Models/admin/Adminproduct.php";
require_once APP_DIR."Utils/Customimage.php";
require_once APP_DIR."Utils/UploadFile.php";
// create objects
$db_object = new Database();
$user_object = new User($db_object);
$product_object = new Adminproduct($db_object);

$url = (empty($id)) ? "admin/products/add" : "admin/products/edit/$id";

if($_SERVER["REQUEST_METHOD"] == "POST") 
{
    // add
    if(isset($_POST["add_product"]) && !empty($id))
    {
        echo "you clicked a button to add";

        $images = [
            new Customimage("product_image1", 1, $_POST["previous_product_image1"]),
            new Customimage("product_image2", 0, $_POST["previous_product_image2"]),
            new Customimage("product_image3", 0, $_POST["previous_product_image3"]),
            new Customimage("product_image4", 0, $_POST["previous_product_image4"])
        ];
        if(startValidation($images)){
             //exit; // for testing
            if (startUpload($images)) {
                $product_object->addProduct($_POST, $images);
            } else {
            echo "Error trying to upload files.";
            }
        } else {
            echo "Error trying to validate files.";
        }
    }

    // edit
    if(isset($_POST["add_product"]) && !empty($id))
    {
        echo "you clicked a button to edit";

        $images = [
            new Customimage("product_image1", 1, $_POST["previous_product_image1"]),
            new Customimage("product_image2", 0, $_POST["previous_product_image2"]),
            new Customimage("product_image3", 0, $_POST["previous_product_image3"]),
            new Customimage("product_image4", 0, $_POST["previous_product_image4"])
        ];
        if(startValidation($images)){
             //exit; // for testing
            if (startUpload($images)) {
                $product_object->updateProduct($id, $_POST, $images);
            } else {
            echo "Error trying to upload files.";
            }
        } else {
            echo "Error trying to validate files.";
        }
    }
}

// call the func getProductDetails and load a product based by the prod id
if(!empty($id)){
    $product_details = $product_object->getProductDetails($id);
    foreach ($product_details as $data) {
        # code...
    }
}

$product_title = (!empty($data["product_title"])) ? $data["product_title"] : "";
$product_description = (!empty($data["product_description"])) ? $data["product_description"] : "";
$product_price = (!empty($data["product_price"])) ? $data["product_price"] : "";
$product_quantity = (!empty($data["product_quantity"])) ? $data["product_quantity"] : "";
$product_image1 = (!empty($data["product_image1"])) ? $data["product_image1"] : "";
$product_image2 = (!empty($data["product_image2"])) ? $data["product_image2"] : "";
$product_image3 = (!empty($data["product_image3"])) ? $data["product_image3"] : "";
$product_image4 = (!empty($data["product_image4"])) ? $data["product_image4"] : "";
$product_status = (!empty($data["product_status"])) ? $data["product_status"] : "";
$product_category = (!empty($data["product_category"])) ? $data["product_category"] : "";

// require and load views
require_once APP_DIR."Views/admin_header.php";
require_once APP_DIR."Views/pages/admin/manage_product.php";
require_once APP_DIR."Views/admin_footer.php";
