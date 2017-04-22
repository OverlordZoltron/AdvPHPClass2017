<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Read File</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    </head>
    <body>
        <?php
        // put your code here
        include './views/navigation.html.php';
        
        //On the file read page be sure to display the file size, the file type, date created and a link to the file directly. (10 points).

        //On the file read page I should have action buttons that will allow me to delete the file. (10 points)

        //On the file read page, knowing the type of file it is display the images in an img tag, 
        //display text in a textarea tag(use new SplFileObject class), 
        //use the object tag or an iframe to display pdf files or HTML. 
        //All other files can stay as a link to direct download. (5 points)
        // <object src="'+file+'"><embed src="'+file+'"></embed></object>
        /* ****************UPDATE FILE**************** */
        
        $filename = filter_input(INPUT_GET, 'filename');
        
        
        $file = '.'.DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.$filename;
        
        //http://php.net/manual/en/fileinfo.constants.php
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        $type = $finfo->file($file);
        
        var_dump($type, '<br /><br />');
        
        //http://php.net/manual/en/function.filesize.php
        var_dump(filesize($file), '<br /><br />');
        
        /*
         * To delete a file use unlink
         * 
         *  unlink($file)
         */
        
        
        // http://php.net/manual/en/class.splfileinfo.php
        $finfo = new SplFileInfo($file);
        
        if ( $finfo->isFile() ) {
            var_dump($finfo->getRealPath(), '<br /><br />');
            var_dump($finfo->getFilename(), '<br /><br />');
            var_dump(date("l F j, Y, g:i a", $finfo->getMTime()), '<br /><br />');
            var_dump($finfo->getSize(), '<br /><br />');
            var_dump($finfo->getPathname(), '<br /><br />');
            
        }
        ?>
        <!--type -->
        <h2><?php echo $type; ?></h2>
        
        <!--size -->
        <h2><?php echo filesize($file) . ' bytes'; ?></h2>
        
        <!--date -->
        <h2><?php echo date("l F j, Y, g:i a", $finfo->getMTime()); ?></h2>
        
        <a class="btn-danger" href="./view-uploads.php<?php unlink($file);?>">Delete</a>
        
        <!--link to image -->
    </body>
</html>
