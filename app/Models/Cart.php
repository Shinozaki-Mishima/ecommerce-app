<?php

use Stripe\Customer;

class Cart
{
    protected $pdo = null;
    //
    private $sub_total = 0;
    private $total = 0;
    private $discount_percent = 0;
    private $discount_price = 0;
    private $cart_details = array();

    /**
     * Constructor that takes pdo connection
     */
    public function __construct(Database $pdo)
    {
        if (!isset($pdo->pdo)) return null;
        $this->pdo = $pdo->pdo;
        $this->setSessions();
    }

    // get cart details
    public function getCartDetails($user_id)
    {
        $sql = "SELECT * 
        FROM cart, products, discounts 
        WHERE cart.product_id = products.product_id
        AND products.discount_id = discounts.discount_id
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
            $this->discount_percent += $data["discount_percent"];
            $this->discount_price = ($this->discount_percent / 100) * $this->total;
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
    public function getSubTotal() {
        return $this->sub_total;
    }
    // get total 
    public function getTotal() {
        return $this->total;
    }
    // calc total
    public function calculateTotal() {
        $total = $this->sub_total;
        $amount_to_add = [0, 0, 0, 0];
        $amount_to_subtract = [$_SESSION["checkout"]["points_discount_amount"], 0, 0, 0];
        $total = $this->calculateAmountOff($total, $amount_to_subtract);
        $total = $this->calculateAmountAdded($total, $amount_to_add);

        $this->total = $total;
    }
    // get discount 
    public function getDiscount() {
        return $this->discount_percent;
    }
    public function calculateAmountOff($total, $arr_of_values) {
        $amount = array_sum($arr_of_values);
        return $total - $amount;
    }

    public function calculateAmountAdded($total, $arr_of_values) {
        $amount = array_sum($arr_of_values);
        return $total + $amount;
    }


    // get discounted price 
    public function getDiscountPrice() {
        return number_format($this->discount_price, 2);
    }

    public function setSessions() {
        $names = [
            "points_used",
            "points_gained",
            "points_discount_amount",
        ];

        foreach ($names as $key) {
            if(empty($_SESSION["checkout"][$key])) {
                // if emptry, assign a default val
                $_SESSION["checkout"][$key] = 0;
            }
        }
    }

    public function resetSessions() {
        unset($_SESSION["checkout"]);
    }

    // Following functions related to points  

    public function setPointsUsed($points_used) {
        // convert points used to money
        $points_discount_amount = POINT::getDiscountAmount($points_used);

        // check if discount > or = to subtotal
        if($points_discount_amount >= $this->sub_total) {
            // call reset func
            $this->resetPoints();
            $_SESSION["message"] = "Discounts cannot be greater than cart total.";
            return;
        }

        // check if user has enough points
        if($_SESSION["current_user"]["total_points"] >= $points_used) {
            // can exhange points
            $_SESSION["checkout"]["points_used"] = $points_used;
            $_SESSION["checkout"]["points_discount_amount"] = POINT::getDiscountAmount($points_used);
            // alert the user that the discount points were applied 
            $_SESSION["message"] = "Discount recieved from loyalty points has been applied.";

        } else {
            // can not exchange points
            $this->resetPoints();
            $_SESSION["message"] = "Sorry, you do not have enough loyalty points to continue.";
            return;
        }
    }

    public function resetPoints() {
        // reset points
        $_SESSION["checkout"]["points_used"] = 0;
        $_SESSION["checkout"]["points_discount_amount"] = 0;
    }

    public function setUserTotalPoints() {}

    public function getUserTotalPoints() {
        return $_SESSION["current_user"]["total_points"];
    }

    public function getPointsGained() {
        return POINT::getPoints($this->total);
    }

    public function getPointsUsed() {
        return $_SESSION["checkout"]["points_used"];
    }

    public function getPointsDiscountAmount() {
        return $_SESSION["checkout"]["points_discount_amount"];
    }
    

}  // end of class