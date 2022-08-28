<?php

use Stripe\Customer;

class Cart
{
    protected $pdo = null;
    //
    private $sub_total = 0;
    private $total = 0;
    private $cart_details = array();

    /**
     * Constructor that takes pdo connection
     */
    public function __construct(Database $pdo)
    {
        if (!isset($pdo->pdo)) return null;
        $this->pdo = $pdo->pdo;
    }

    // get cart details
    public function getCartDetails($user_id)
    {
        $sql = "SELECT * 
        FROM cart, products, discounts 
        WHERE cart.product_id = products.product_id
        AND products.product_id = discounts.discount_id
        AND cart.user_id = ?
        AND cart.cart_status = 'cart'";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$user_id]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // get the sub total
        foreach ($result as $data) {
            // this = referes to obj in class
            $this->sub_total += Customhelper::calculateDiscountAmount(
                $data["product_price"], 
                $data["discount_percent"]) * $data["cart_quantity"];
                
            $this->total += $data["product_price"] * $data["cart_quantity"];
        }
        $this->cart_details = $result;

        return $result;
    }

    // add to cart use named placeholder in sql query
    public function addToCart($user_id, $product_id, $cart_quantity)
    {
        $data = [
            "user_id" => $user_id,
            "product_id" => $product_id,
            "cart_quantity" => $cart_quantity
        ];

        $sql = "INSERT INTO `cart`
        (`cart_id`,
        `user_id`,
        `product_id`,
        `cart_created`,
        `cart_quantity`,
        `cart_status`)
        VALUES
        (
            NULL,
            :user_id,
            :product_id,
            current_timestamp(),
            :cart_quantity,
            'cart'
        );
        ";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
    }

    // remove item from cart - use positional placeholders (= in sql query
    public function removeFromCart($cart_id, $user_id)
    {
        $sql = "DELETE FROM cart WHERE cart_id = ? AND user_id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$cart_id, $user_id]);
    }

    // update cart content
    public function updateCart($user_id, $product_id, $cart_quantity)
    {
        $sql = "UPDATE cart set cart_quantity = ? WHERE user_id = ? AND product_id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$cart_quantity, $user_id, $product_id]);
    }
    
    // get subtotal
    public function getSubTotal(){
        return $this->sub_total;
    }
    // get total 
    public function getTotal(){
        return $this->total;
    }
    // calc total
    public function calculateTotal(){
        return $this->sub_total;
    }
}