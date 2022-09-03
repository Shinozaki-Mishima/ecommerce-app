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

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
    }
    // login model
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
            return true;
        } else {
            // if the user is not found
            //echo "No user found.";
        }

        return false;
    }
}  // end of class