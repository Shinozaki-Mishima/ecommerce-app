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
            "password" => $inputs["password"],
        ];

        // use placeholders to execute insert statement
        // Pass associative array to execute, NOTICE there isn't [] in execute
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
}