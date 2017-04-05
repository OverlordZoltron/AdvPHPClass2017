<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Add Address</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    </head>
    <body>
        <?php
        // put your code here
        require_once './autoload.php';
        include './templates/navigation.html.php';

        $fullname = filter_input(INPUT_POST, 'fullname');
        $email = filter_input(INPUT_POST, 'email');
        $addressline1 = filter_input(INPUT_POST, 'addressline1');
        $city = filter_input(INPUT_POST, 'city');
        $state = filter_input(INPUT_POST, 'state');
        $zip = filter_input(INPUT_POST, 'zip');
        $birthday = filter_input(INPUT_POST, 'birthday');

        $errors = [];
        $validation = new Validation();
        
        $utilClass = new Util();
        $getStates = $utilClass->getStates();
        
        $address = new AddressCRUD();
        
        $checkPostRequest = $utilClass->isPostRequest();

        if ($checkPostRequest) {

            if (empty($fullname)) {
                $errors[] = 'Full Name is Required.';
            }

            if ($validation->isEmailValid($email) == false) {
                $errors[] = 'Email is not valid!';
            }

            /* if (filter_var($email, FILTER_VALIDATE_EMAIL) == false ){
              $errors[] = 'Email is not valid!';
              } */

            if (empty($addressline1)) {
                $errors[] = 'Address 1 is Required.';
            }

            if (empty($city)) {
                $errors[] = 'City is Required.';
            }

            if (empty($state)) {
                $errors[] = 'State is required.';
            }

            if ($validation->isZIPValid($zip) === false) {
                $errors[] = 'Zip is not valid.';
            }

            if ($validation->isDateValid($birthday) === false) {
                $errors[] = 'Birthdate is required';
            }

            if (count($errors) === 0) {
                if ($address->createAddress($fullname, $email, $addressline1, $city, $state, $zip, $birthday)) {
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
