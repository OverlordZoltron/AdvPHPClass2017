<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        require_once './models/dbconnect.php';
        require_once './models/addressCRUD.php';
        include './models/validation.php';
        require_once './models/util.php';
        
        $fullname = filter_input(INPUT_POST, 'fullname');
        $email = filter_input(INPUT_POST, 'email');
        $addressline1 = filter_input(INPUT_POST, 'addressline1');
        $city = filter_input(INPUT_POST, 'city');
        $state = filter_input(INPUT_POST, 'state');
        $zip = filter_input(INPUT_POST, 'zip');
        $birthday = filter_input(INPUT_POST, 'birthday');
        
        $errors = [];
        $states = getStates();
        
        if (isPostRequest()){
            
            if (empty($fullname)){
                $errors[] = 'Full Name is Required.';
            }
            
            if (isEmailValid($email) == false ){
                $errors[] = 'Email is not valid!';
            }
            
            /*if (filter_var($email, FILTER_VALIDATE_EMAIL) == false ){
                $errors[] = 'Email is not valid!';
            }*/
            
            if (empty($addressline1)){
                $errors[] = 'Address 1 is Required.';
            }
            
            if (empty($city)){
                $errors[] = 'City is Required.';
            }
            
            if (empty($state)){
                $errors[] = 'State is required.';
            }
            
            if (isZIPValid($zip) === false){
                $errors[] = 'Zip is not valid.';
            }
            
            if (isDateValid($birthday) === false){
                $errors[] = 'Birthdate is required';
            }
            
            if (count($errors) === 0){
                if (createAddress($fullname, $email, $addressline1, $city, $state, $zip, $birthday)){
                    $message = 'Address Added.';
                    $fullname = '';
                    $email = '';
                    $addressline1 = '';
                    $city = '';
                    $state = '';
                    $zip = '';
                    $birthday = '';
                    
                } else {
                    $errors[] = 'Could not add to the Database';
                }
            }
        }
        
        include './templates/errors.html.php';
        include './templates/add-address.html.php';
        include './templates/messages.html.php';
        ?>
    </body>
</html>
