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
        // put your code here
        include './views/navigation.html.php';
        $counter = 1;
        $fileDelete = filter_input(INPUT_GET, 'deleteFile');
        
        if (is_string($fileDelete)) {
            $file = '.'.DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.$fileDelete;
            if (is_file($file)){
                unlink($file);
            }
        }

        
        //$file = '.'.DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.$fileInfo->getFilename();

        //Create a view page that will display all my files uploaded in a list format with a number order. 
        //There should be a view button/link to each file to view more details. 
        //There should be a delete button/link to remove the file. (10 points)
        $folder = './uploads';
        if (!is_dir($folder)) {
            die('Folder <strong>' . $folder . '</strong> does not exist');
        }
        $directory = new DirectoryIterator($folder);
        ?>
        <table class="table table-hover">
            <tr>
                <th>Number</th>
                <th>File Name</th>
                <th>Details</th>
                <th>Delete File</th>
            </tr>
            <?php foreach ($directory as $fileInfo) : ?>
                <?php if ($fileInfo->isFile()) : ?>
                    <tr>
                        <td><?php echo $counter++ ?></td>
                        <td><?php echo $fileInfo->getFilename(); ?></td>
                        <td><a href="read-file.php?filename=<?php echo $fileInfo->getFilename();?>">Details</a></td>
                        <td><a href="?deleteFile=<?php echo $fileInfo->getFilename();?>" class="btn-danger">Delete</a></td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </table>
    </body>
</html>
