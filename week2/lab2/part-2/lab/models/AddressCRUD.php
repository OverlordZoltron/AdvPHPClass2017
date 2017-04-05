<?php

/**
 * AddressCRUD class used to store functions related to creating/reading Addresses
 *
 * @author 001031823
 */
class AddressCRUD extends DB {
    /**
     * Sets parent connections
     */
    function __construct() {
        parent::__construct('mysql:host=localhost;port=3306;dbname=PHPAdvClassSpring2017','root','');
    }
    
    /*
     * A method to get all address data 
     * returns Array  
     */

    function readAllAddress() {
        $db = $this->getDb();
        $stmt = $db->prepare("SELECT * FROM ADDRESS");

        $results = array();
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        return $results;
    }

    /*
     * A method to add address data to the database
     * 
     * @param String $fullname
     * @param String $email
     * @param String $address1
     * @param String $city
     * @param String $state
     * @param String $zip
     * @param String $birthday
     * 
     * @return boolean
     */

    function createAddress($fullname, $email, $addressline1, $city, $state, $zip, $birthday) {
        $db = $this->getDb();
        $stmt = $db->prepare("INSERT INTO address SET fullname = :fullname, email = :email, addressline1 = :addressline1, city = :city, state = :state, zip = :zip, birthday = :birthday");
        $binds = array(
            ":fullname" => $fullname,
            ":email" => $email,
            ":addressline1" => $addressline1,
            ":city" => $city,
            ":state" => $state,
            ":zip" => $zip,
            ":birthday" => $birthday
        );
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            return true;
        }

        return false;
    }

}
