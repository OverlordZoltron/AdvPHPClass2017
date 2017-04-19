<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Upload Form</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    </head>
    <body>
        <?php
        include './views/navigation.html.php';
        include './views/upload-form.html.php';
        
        //Create a page that will allow me to upload a new file. 
        //I should only be allowed to upload images, text files, html files, word docs and excel files.  (20 points)

        //Make sure to add validation and let the user know why the file was not uploaded. Use exceptions. (10 points)
        ?>
    </body>
</html>
