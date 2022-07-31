<?php 

class Adminproduct extends Product {

    public function addProduct($inputs) 
    {
        $data = [
            "product_title" => $inputs["product_title"],
            "product_description" => $inputs["product_description"],
            "product_price" => $inputs["product_price"],
            "product_discount_amount" => 0,
            "product_quantity" => $inputs["product_quantity"],
            "product_image1" => "images/products/iphone1-1.jpg",
            "product_image2" => "images/products/iphone1-1.jpg",
            "product_image3" => "images/products/iphone1-1.jpg",
            "product_image4" => "images/products/iphone1-1.jpg",
            "product_status" => $inputs["product_status"],
            "product_category" => $inputs["product_category"]
        ];

        $sql = "INSERT INTO .`products`
        (`product_id`,
        `product_title`,
        `product_description`,
        `product_price`,
        `product_discount_amount`,
        `product_quantity`,
        `product_image1`,
        `product_image2`,
        `product_image3`,
        `product_image4`,
        `product_created`,
        `product_status`,
        `product_category`)
        VALUES
        (
            NULL,
            :product_title,
            :product_description,
            :product_price,
            :product_discount_amount,
            :product_quantity,
            :product_image1,
            :product_image2,
            :product_image3,
            :product_image4,
            current_timestamp(),
            :product_status,
            :product_category
        );        
        ";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
    }
}