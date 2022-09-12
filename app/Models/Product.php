<?php

class Product
{
    protected $pdo = null;
    private $discount = 0;
    
    /**
     * Constructor that takes pdo connection
     */
    public function __construct(Database $pdo)
    {
        if (!isset($pdo->pdo)) return null;
        $this->pdo = $pdo->pdo;
    }
    // get all products
    public function getAllProducts()
    {
        $sql = "SELECT *,
        CAST(product_price - (discount_percent / 100 * product_price) AS DECIMAL(7,2)) product_discount_price
        FROM products, discounts
        WHERE products.discount_id = discounts.discount_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    // get 1 product, and fetch its details
    public function getProductDetails($product_id)
    {
        $sql = "SELECT * FROM products WHERE product_id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$product_id]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    // // get product discount percent
    // public function getCartDetails($user_id)
    // {
    //     $sql = "SELECT * 
    //     FROM cart, products, discounts 
    //     WHERE cart.product_id = products.product_id
    //     AND products.discount_id = discounts.discount_id
    //     AND cart.user_id = ?
    //     AND cart.cart_status = 'cart'";

    //     $stmt = $this->pdo->prepare($sql);
    //     $stmt->execute([$user_id]);
    //     $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //     // get the sub total
    //     foreach ($result as $data) {
    //         $this->discount += $data["discount_percent"];
    //     }
    //     return $this->discount;
    // }
}