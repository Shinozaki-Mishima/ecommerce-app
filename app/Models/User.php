<?php 

class User
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

    public function emailExists($pdo, $email) {
        $stmt = $pdo->prepare("SELECT 1 FROM users WHERE email=?");
        $stmt->execute([$email]);
        return $stmt->fetchColumn();
    }

    public function passwordExists($pdo, $inputs) {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email=?");
        $stmt->execute([$inputs["email"]]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user && password_verify($inputs["password"], $user["password"])) {
            $_SESSION["message"] = "Password already in use, Please try again.";
            header("location: ".BASE_URL."registration");
            exit;
        }

    }

    public function register($inputs) 
    {
        $data = [
            "first_name" => $inputs["first_name"],
            "last_name" => $inputs["last_name"],
            "email" => $inputs["email"],
            "password" => password_hash($inputs["password"], PASSWORD_DEFAULT),
        ];

        // use placeholders to execute insert statement
        // Pass associative array to execute
        $sql = "INSERT INTO `eccom_database`.`users`
        (`user_id`,
        `first_name`,
        `last_name`,
        `email`,
        `password`,
        `user_created`,
        `user_type`)
        VALUES
        (
            NULL,
            :first_name,
            :last_name,
            :email,
            :password,
            current_timestamp(),
            'user'
        );        
        ";

        // check to see if the user exists 
        if($this->emailExists($this->pdo, $data["email"])){
            $_SESSION["message"] = "Email already exists, Please attempt to login.";
            header("location: ".BASE_URL."registration");
            exit;
        } 
        // check to ensure all fields are filled
        if(empty($inputs["email"]) || empty($inputs["password"]) || empty($inputs["first_name"]) || empty($inputs["last_name"])){
            $_SESSION["message"] = "An Error occurred! Please fill out all fields and try again.";
            header("location: ".BASE_URL."registration");
            exit;
        }

        //$this->passwordExists($this->pdo, $inputs);

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
    }

    // login function
    public function login($inputs) 
    {
        /**
         * Execute a select query using positional ? placeholders
         * Return an associative array when using fetchAll()
        */
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$inputs["email"]]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // find record in db 
        if($user && password_verify($inputs["password"], $user["password"])) 
        {
            // if user exists 
            // echo "Found a user";
            $user["password"] = null;  // make sure it doesn't save password
            $_SESSION["current_user"] = $user;
            // if email inputted = the admin email, foward to admin dashboard
            if($user["email"] == $_ENV["ADMIN_EMAIL"]) { 
                header("location: ".BASE_URL."admin/products/view");
                exit;
            }
            return true;
        } else {
            // if(empty($inputs["email"]) || empty($inputs["password"])){
            //     $_SESSION["message"] = "An Error occurred! User not found or fields were not entered.";
            //     header("location: ".BASE_URL."login");
            //     exit;
            // }
        }
        return false;
    }

    /*NOTE: following utility functions related to loyalty system*/

    // update loyalty points
    public function updateTotalPoints($user_id, $total_points) {
        $sql = "UPDATE users SET total_points = ? WHERE user_id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$total_points, $user_id]);
    }

    // set total points
    public function setTotalPoints($new_points) {
        $_SESSION["current_user"]["total_points"] = $new_points;
    }

}  // end of class