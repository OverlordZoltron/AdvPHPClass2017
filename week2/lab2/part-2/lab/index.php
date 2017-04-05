<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Addresses</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    </head>
    <body>
        <?php
        include './models/dbconnect.php';
        include './models/addressCRUD.php';
        include './templates/navigation.html.php';
        
        $addresses = readAllAddress();
        
        include './templates/view-address.html.php';
        ?>
    </body>
</html>
