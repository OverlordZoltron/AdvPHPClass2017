<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Admin</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    </head>
    <body>
        <?php
        //include sessionaccess page which only allows logged in users to continue
        include './views/sessionaccess.html.php';
        require_once './autoload.php';
        include './views/navigation.html.php';
        
        $util = new Util();
        $accounts = new Accounts();
        
        //Set variables email and ID to hold the users unique id and their email
        $email = $accounts->getUserEmail($_SESSION['user_id']);
        $id = $_SESSION['user_id'];
        
        if ($util->isPostRequest()){
            unset($_SESSION['user_id']);
            $util->redirect("Login.php");
        }
        
        include './views/admin.html.php';
        ?>
    </body>
</html>
