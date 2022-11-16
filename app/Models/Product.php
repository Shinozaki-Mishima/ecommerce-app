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
        $sql = "SELECT * FROM products ORDER BY RAND() LIMIT 13";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $result;
    }
    // get latest products
    public function getLatestProducts()
    {
        $sql = "SELECT * FROM products ORDER BY product_created DESC LIMIT 9";
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
    
    // filter products where inputs = array
    public function filterProducts($inputs)
    {
        $sql = $sql = "SELECT *,
        CAST(product_price - (discount_percent / 100 * product_price) AS DECIMAL(7,2)) product_discount_price
        FROM products, discounts
        WHERE products.discount_id = discounts.discount_id";

        foreach ($inputs as $key => $value) 
        {
            // check if the val is empty
            if(empty($value))
            {
                continue;
            }
            // use switch to check filter method category, price etc.
            switch ($key) 
            {
                case 'category':
                    $sql .= " AND product_category = '$value'";
                    break;
                case 'search':
                    $sql .= " AND product_title LIKE '%$value%'";
                    break;
                case 'min_price':
                    $sql .= " AND product_price >= '$value'";
                    break;
                case 'max_price':
                    $sql .= " AND product_price <= '$value'";
                    break;
                case 'order':
                    $sql .= $this->orderBy($value);
                    break;
                default:
                    # code...
                    break;
            }
        }
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    // order by function
    public function orderBy($key)
    {
        switch ($key) 
        {
            case 'order-title':
                return " ORDER BY product_title ASC";
                break;
            case 'order-title-desc':
                return " ORDER BY product_title DESC";
                break;
            case 'order-price':
                return " ORDER BY product_price ASC";
                break;
            case 'order-price-desc':
                return " ORDER BY product_price DESC";
                break;
            
            default:
                # code...
                break;
        }
    }

    // get all categories
    public function getAllCategories()
    {
        $sql = "SELECT DISTINCT product_category FROM products";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

}  // end of class