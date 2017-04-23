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
        //get file name
        $filename = filter_input(INPUT_GET, 'filename');
        
        //define the files location
        $file = '.'.DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.$filename;
        
        //http://php.net/manual/en/fileinfo.constants.php
        $fMimeInfo = new finfo(FILEINFO_MIME_TYPE);
        $type = $fMimeInfo->file($file);
        
        
        // http://php.net/manual/en/class.splfileinfo.php
        $finfo = new SplFileInfo($file);
        
        
        //get the file ready to display based on what type it is
        switch($type){
            case($type == 'image/jpeg') || ($type == 'image/png') || ($type == 'image/gif'):
                $fileDisplay = '<img src="' . $file . '"/>';
                break;
            case ($type == 'text/html') || ($type == 'application/pdf'):
                //$fileDisplay = '<object src="'. $file .'"><embed src="'. $file .'"></embed></object>';
                $fileDisplay = '<iframe class="embed-responsive-item" src="' . $file . '"></iframe>';
                break;
            case ($type == 'text/plain'):
                $fileObject = new SplFileObject($file, "r");
                $fileSize = $fileObject->fread($fileObject->getSize());
                $fileDisplay = '<textarea class="embed-responsive-item">' . $fileSize . '</textarea>';
                break;
            default:
                $fileDisplay = "";
        }
        
        
        /*
         * To delete a file use unlink
         * 
         *  unlink($file)
         */
        $fileDelete = filter_input(INPUT_GET, 'deleteFile');
        
        //check if fileDelete is a string
        if (is_string($fileDelete)) {
            //if so set the full file path with file name
            $fileToDelete = '.'.DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.$fileDelete;
            //if there is a file inside $file unlink it
            if (is_file($fileToDelete)){
                unlink($fileToDelete);
            }
        }
        
        include './views/read-file.html.php';
        ?>
    </body>
</html>
