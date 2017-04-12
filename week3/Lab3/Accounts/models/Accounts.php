<?php
/**
 * Accounts CRUD used for getting and posting DB information
 *
 * @author 001031823
 */
class Accounts extends DB {
    //put your code here
    /**
     * Sets parent connections
     */
    function __construct() {
        $dbConfig = array(
        "DB_DNS" => 'mysql:host=localhost;port=3306;dbname=PHPAdvClassSpring2017',
        "DB_USER" => 'root',
        "DB_PASSWORD" => ''
        );
        parent::__construct($dbConfig);
    }
    
    /*
     * A method to add user signup data to the database
     * 
     * @param String $email
     * @param String $password
     * 
     * @return boolean
     */
    public function signup($email, $password){
        $db = $this->getDb();
        $stmt = $db->prepare("INSERT INTO users SET email = :email, password = :password, created = NOW()");
        $binds = array(
            ":email" => $email,
            ":password" => password_hash($password, PASSWORD_DEFAULT)
        );
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            return true;
        }

        return false;
    }
    
    /*
     * A method to log the user in
     * 
     * @param String $email
     * @param String $password
     * 
     * @return integer
     */
    public function login($email, $password){
        
        $db = $this->getDb();
        $stmt = $db->prepare("SELECT * FROM users WHERE email = :email LIMIT 1");
        
        $binds = array(
            ":email" => $email
        );
        
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = $stmt->fetch(PDO::FETCH_ASSOC);
            if (password_verify($password, $results['password'])){
                return $results['user_id'];
            }
        }
        
        return 0;
    }
    
    /*
     * A method to add user signup data to the database
     * 
     * @param String $email
     * 
     * @return boolean
     */
    public function isEmailRegistered($email){
        $db = $this->getDb();
        $stmt = $db->prepare("SELECT * FROM users WHERE email = :email");
        
        $binds = array(
            ":email" => $email
        );
        
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            return true;
        }

        return false;
    }
    
    public function getUserEmail($id){
        $db = $this->getDb();
        $stmt = $db->prepare("SELECT * FROM users WHERE user_id = :user_id");
        
        $binds = array(
            ":user_id" => $id
        );
        
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = $stmt->fetch(PDO::FETCH_ASSOC);
            return $results['email'];
        }

        return '';
    }
}
