<?php
/**
 * A method to validate a given zip code
 * 
 * @param String $zip
 * 
 * @return boolean
 */
function isZIPValid($zip){
    $zipRegex = '/^[0-9]{5}$/';
    if (preg_match($zipRegex, $zip)){
        return true;
    }
    return false;
}

/**
 * A method to validate a given birthdate
 * 
 * @param String $birthday
 * 
 * @return boolean
 */
function isDateValid($birthday){
    return (bool)strtotime($birthday);
}

/**
 * A method to validate a given email
 * 
 * @param String $email
 * 
 * @return boolean
 */
function isEmailValid($email){
    
}

