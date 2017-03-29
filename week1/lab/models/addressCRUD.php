<?php
/*
 * A method to get all address data 
 * returns Array  
 */
function readAllAddress(){
    $db = dbconnect();
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
function createAddress($fullname, $email, $address1, $city, $state, $zip, $birthday){
    
    $db = dbconnect();
    $stmt = $db->prepare("INSERT INTO phone SET fullname = :fullname, email = :email, address1 = :address1, city = :city, state = :state, zip = :zip, birthday = :birthday");
    
    $binds = array(
        ":fullname" => $fullname,
        ":email" => $email,
        ":address1" => $address1,
        ":city" => $city,
        ":state" => $state,
        ":zip" => $zip,
        ":birthday" => $birthday,
    );
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        return true;
    }
    
    return false;
}

