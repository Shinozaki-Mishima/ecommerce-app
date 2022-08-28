<?php 

class Adminproduct extends Product {

    // add product
    public function addProduct($inputs, $images) 
    {
        $data = [
            "product_title" => $inputs["product_title"],
            "product_description" => $inputs["product_description"],
            "product_price" => $inputs["product_price"],
            "product_discount_amount" => 0,
            "product_quantity" => $inputs["product_quantity"],
            "product_image1" => $images[0]->new_name,
            "product_image2" => $images[1]->new_name,
            "product_image3" => $images[2]->new_name,
            "product_image4" => $images[3]->new_name,
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

    // update function
    public function updateProduct($id, $inputs, $images) 
    {
        $data = [
            "product_title" => $inputs["product_title"],
            "product_description" => $inputs["product_description"],
            "product_price" => $inputs["product_price"],
            "product_discount_amount" => 0,
            "product_quantity" => $inputs["product_quantity"],
            "product_image1" => $images[0]->new_name,
            "product_image2" => $images[1]->new_name,
            "product_image3" => $images[2]->new_name,
            "product_image4" => $images[3]->new_name,
            "product_status" => $inputs["product_status"],
            "product_category" => $inputs["product_category"],
            "product_id" => $id
        ];

        $sql = "UPDATE `products`
        SET
        `product_title` = :product_title,
        `product_description` = :product_description,
        `product_price` = :product_price,
        `product_discount_amount` = :product_discount_amount,
        `product_quantity` = :product_quantity,
        `product_image1` = :product_image1,
        `product_image2` = :product_image2,
        `product_image3` = :product_image3,
        `product_image4` = :product_image4,
        `product_status` = :product_status,
        `product_category` = :product_category
        WHERE `product_id` = :product_id;                
        ";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
    }


    // discounts 
    public function getAllDiscounts()
    {
        $sql = "SELECT * FROM discounts";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    // insert discount
    public function addDiscount($inputs)
    {
        // format discount start and expiry date 
        $format = "Y-m-d H:i:s";
        $discount_start = date_format(date_create($inputs["discount_start"] . "00:00:00"), $format);
        $discount_expiry = date_format(date_create($inputs["discount_expiry"] . "00:00:00"), $format);

        $data = [
            "discount_description" => $inputs["discount_description"],
            "discount_percent" => $inputs["discount_percent"],
            "discount_start" => $discount_start,
            "discount_expiry" => $discount_expiry,
            "discount_status" => $inputs["discount_status"],
        ];

        $sql = "INSERT INTO `discounts`
        (`discount_id`,
        `discount_description`,
        `discount_percent`,
        `discount_created`,
        `discount_start`,
        `discount_expiry`,
        `discount_status`)
        VALUES
        (
            NULL,
            :discount_description,
            :discount_percent,
            current_timestamp(),
            :discount_start,
            :discount_expiry,
            :discount_status
        );        
        ";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
    }

    // assign discount
    public function assignDiscount($product_details, $discount_id){
        $stmt = $this->pdo->prepare("UPDATE products SET discount_id = ? WHERE product_id = ?");
        foreach ($product_details as $data) {
            # code...
            $product_id = $data["product_id"];
            $stmt->execute([$discount_id, $product_id]);
        }
    }

} // end of class