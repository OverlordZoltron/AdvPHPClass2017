<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>View Uploads</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    </head>
    <body>
        <?php
        // include navigation
        include './views/navigation.html.php';
        //get the information from deleteFile
        $fileDelete = filter_input(INPUT_GET, 'deleteFile');
        
        //check if fileDelete is a string
        if (is_string($fileDelete)) {
            //if so set the full file path with file name
            $file = '.'.DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.$fileDelete;
            //if there is a file inside $file unlink it
            if (is_file($file)){
                unlink($file);
            }
        }

        $folder = './uploads';
        if (!is_dir($folder)) {
            die('Folder <strong>' . $folder . '</strong> does not exist');
        }
        //initialize a new directory iterator
        $directory = new DirectoryIterator($folder);
        
        include './views/view-uploads.html.php';
        ?>
    </body>
</html>
