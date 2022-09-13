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

    /*NOTICE!!: FUNCTIONS for recommended items below*/
    // get randomly recommended products
    public function getRandomProducts()
    {
        $sql = "SELECT * FROM products ORDER BY RAND() LIMIT 4";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    // get latest products
    public function getLatestProducts()
    {
        $sql = "SELECT * FROM products ORDER BY product_created DESC LIMIT 4";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    // get best sellers
    public function getBestSellingProducts()
    {
        $sql = "SELECT *, COUNT(order_details.product_id) times_sold
        FROM order_details, products
        WHERE order_details.product_id = products.product_id
        GROUP BY order_details.product_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    // get weekly best sellers 
    public function getBestWeeklySellingProducts()
    {
        $sql = "SELECT *, COUNT(order_details.product_id) times_sold
        FROM order_details, products
        WHERE order_details.product_id = products.product_id
        AND order_details_created >= '2022-09-1 00:00:00'
        AND order_details_created <= '2022-09-13 23:59:00'
        GROUP BY order_details.product_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    // get recommended products
    public function getRecommendedProducts($product_id)
    {
        $sql = "SELECT * FROM products
        WHERE product_id in 
        (SELECT DISTINCT product_id FROM order_details WHERE order_id in
        (SELECT DISTINCT order_id FROM order_details WHERE product_id = ?)
        AND product_id != ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$product_id, $product_id]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    
}  // end of class