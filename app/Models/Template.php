<?php
class Template
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

    /**
     * Execute a select query using positional ? placeholders
     * Return an associative array when using fetchAll()
     */
    public function select($user_id, $first_name)
    {
        $sql = "SELECT * FROM test where id = ? AND first_name = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$user_id, $first_name]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }


    /**
     * Return ONLY 1 row / assoociative array using fetch
     * Execute a select query using positional ? placeholders
     * Return an associative array when using fetchAll()
     */
    public function selectRow()
    {
        $sql = "SELECT * FROM test LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }


    /**
     * Return ONLY 1 row / assoociative array using fetchAll
     * Execute a select query using positional ? placeholders
     * Return an associative array when using fetchAll()
     */
    public function selectRows()
    {
        $sql = "SELECT * FROM test";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    /**
     * Execute an insert query using placeholders
     * Generally insert quires require multiple values
     * Pass associative array to execute, NOTICE there isn't [] in execute
     */
    public function insert($value1, $value2)
    {
        $data = [
            "first_name" => $value1,
            "last_name" => $value2,
        ];

        $sql = "INSERT INTO `ecommerce_v2_improved`.`test`
        (`id`,
        `first_name`,
        `last_name`,
        `date_done`)
        VALUES
        (
        NULL,
        :first_name,
        :last_name,
        CURRENT_TIMESTAMP
        )
        ";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
    }

    /**
     * Execute an update query using positional ? paramters
     * Pass array to execute
     */
    public function update($value1, $value2)
    {
        $sql = "UPDATE `test` SET `first_name` = ? WHERE `test`.`id` = ?;";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$value1, $value2]);
    }

    /**
     * Execute a delete query using positional ? paramters
     */
    public function delete($value)
    {
        $sql = "DELETE FROM `test` WHERE `test`.`id` = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$value]);
    }


    /**
     * Execute a select query using positional ? paramters
     * Optional to specify data type, e.g. PDO::PARAM_INT is optional 
     * Return an associative array
     */
    public function selectWithParams1($user_id, $first_name)
    {
        $sql = "SELECT * FROM users where user_id = ? AND first_name = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(1, $user_id, PDO::PARAM_INT); //integer
        $statement->bindParam(2, $first_name, PDO::PARAM_STR); //string
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }


    /**
     * Execute a select query using named placeholder :some_name paramters
     * Optional to specify data type, e.g. PDO::PARAM_INT is optional 
     * Return an associative array
     */
    public function selectWithParams2($user_id, $first_name)
    {
        $sql = "SELECT * FROM users where user_id = :user_id AND first_name = :first_name";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(":user_id", $user_id, PDO::PARAM_INT); //integer
        $statement->bindParam(":first_name", $first_name, PDO::PARAM_STR); //string
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
