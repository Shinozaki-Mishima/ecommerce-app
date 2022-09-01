<?php

use Stripe\Customer;

class Order
{
    protected $pdo = null;
    /**
     * Constructor that takes pdo connection
     */
    public function __construct(Database $pdo)
    {
        if (!isset($pdo->pdo)) return null;
        $this->pdo = $pdo->pdo;
    }

    //
    public function insertOrder($user_id, $subtotal, $total, $total_discount_amount, $payment, $payment_id)
    {
        $data = [
            "user_id" => $user_id,
            "subtotal" => $subtotal,
            "total" => $total,
            "total_discount_amount" => $total_discount_amount,
            "payment" => $payment,
            "payment_id" => $payment_id,
        ];

        $sql = "INSERT INTO `orders`
        (`order_id`,
        `user_id`,
        `subtotal`,
        `total`,
        `total_discount_amount`,
        `order_created`,
        `payment`,
        `payment_id`)
        VALUES
        (
            NULL,
            :user_id,
            :subtotal,
            :total,
            :total_discount_amount,
            current_timestamp(),
            :payment,
            :payment_id
        );
        ";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
        return $this->pdo->lastInsertId();
    }  // end of function

    public function insertOrderDetails($cart_details, $order_id) 
    {
        $insertData = [];
        $updateData = [];

        foreach ($cart_details as $data) {
            // insert data into insertData
            array_push($insertData, [
                "order_id" => $order_id,
                "product_id" => $data["product_id"],
                "order_details_price" => $data["product_price"],
                "order_details_quantity" => $data["cart_quantity"]
            ]);
            // insert data into updateData
            array_push($updateData, [
                "cart_id" => $data["cart_id"]
            ]);
        }
        $this->multiInsert($insertData);
        // testing
        // echo "It should have worked";
        // exit;
        $this->multiUpdate($updateData);
    }  // end of function

    public function multiInsert($data) 
    {
        $sql = "INSERT INTO `order_details`
        (`order_details_id`,
        `order_id`,
        `product_id`,
        `order_details_price`,
        `order_details_quantity`,
        `order_details_created`)
        VALUES
        (
            NULL,
            :order_id,
            :product_id,
            :order_details_price,
            :order_details_quantity,
            current_timestamp()
        );
        ";
        $stmt = $this->pdo->prepare($sql);

        foreach ($data as $array) {
            $stmt->execute($array);
        }
    }  // end of function

    public function multiUpdate($data)
    {
        $sql = "UPDATE cart SET cart_status = 'purchased' WHERE cart_id = :cart_id";
        $stmt = $this->pdo->prepare($sql);

        foreach ($data as $array) {
            $stmt->execute($array);
        }
    }  // end of function

    
}  // end of class