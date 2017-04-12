<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Signup</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    </head>
    <body>
        <?php
        // put your code here
        include './autoload.php';
        include './views/navigation.html.php';

        $util = new Util();
        $accounts = new Accounts();
        $validation = new Validation();
        $errors = [];


        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');


        if ($util->isPostRequest()) {

            if ($validation->isEmailValid($email) == false) {
                $errors[] = 'Email is not valid!';
            }
            if ($accounts->isEmailRegistered($email)) {
                $errors[] = 'Email is already registered';
            }

            if (count($errors) === 0) {
                if ($accounts->signup($email, $password)) {
                    $util->redirect("Login.php", array("email" => $email));
                }
            }
        }

        include './views/errors.html.php';
        include './views/signup.html.php';
        ?>
    </body>
</html>
