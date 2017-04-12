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
        include './views/sessionaccess.html.php';
        require_once './autoload.php';
        include './views/navigation.html.php';
        
        
        //display user_id and email
        $accounts = new Accounts();
        
        $email = $accounts->getUserEmail($_SESSION['user_id']);
        $id = $_SESSION['user_id'];
        //echo $email;
        
        //logout button
        //unset the user id
        
        //when they log out redirect the user to the login page
        include './views/admin.html.php';
        ?>
    </body>
</html>
