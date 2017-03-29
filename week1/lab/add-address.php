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
        require_once './models/util.php';
        require_once './models/addressCRUD.php';
        
        $fullname = filter_input(INPUT_POST, 'fullname');
        $email = filter_input(INPUT_POST, 'email');
        $address1 = filter_input(INPUT_POST, 'address1');
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
            
            if ( filter_var($email, FILTER_VALIDATE_EMAIL) !== false ){
                $errors[] = 'Email is not valid!';
            }
            
            if (empty($address1)){
                $errors[] = 'Address 1 is Required.';
            }
            
            if (empty($city)){
                $errors[] = 'City is Required.';
            }
        }
        
        include './templates/add-address.html.php';
        include './templates/errors.html.php';
        include './templates/messages.html.php';
        ?>
    </body>
</html>
