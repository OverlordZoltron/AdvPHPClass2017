<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    </head>
    <body>
        <?php
        // put your code here
        session_start();
        require_once './autoload.php';
        include './views/navigation.html.php';
        
        
        $util = new Util();
        $accounts = new Accounts();
        
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');
        
        $errors = [];
        
        if ($util->isPostRequest()){
            $loginInfo = $accounts->login($email, $password);
            if ($loginInfo > 0){
                $_SESSION['user_id'] = $loginInfo;
                $util->redirect("Admin.php");
            }
            else {
                $errors[] = "Information is incorrect, please try again.";
            }
        }
        
        include './views/errors.html.php';
        include './views/login.html.php';
        ?>
    </body>
</html>
