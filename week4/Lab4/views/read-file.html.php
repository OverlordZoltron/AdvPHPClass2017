<h1 class="text-center">File Information</h1>
<div class="container">
    <div class="row">
        <div class="col-md-9 col-md-offset-3">
            <!--type -->
            <p><b>File Type: </b><?php echo $type; ?></p>

            <!--size -->
            <p><b>File Size: </b><?php echo filesize($file) . ' bytes'; ?></p>

            <!--date -->
            <p><b>Creation Date: </b><?php echo date("l F j, Y, g:i a", $finfo->getMTime()); ?></p>

            <!--link to file -->
            <p><b>Direct Link: </b><a href="<?php echo $file ?>"><?php echo $filename ?></a></p>

            <!--Delete button -->
            <p><a href="?deleteFile=<?php echo $finfo->getFilename(); ?>"><button type="button" class="btn btn-danger">Delete</button></a></p>
            <p></p>
            
            <!--Display  in responsive embed -->
            <div class="embed-responsive embed-responsive-16by9">
                <!--Display file based on what type it was in the switch -->
                <?php echo $fileDisplay; ?>
            </div>
        </div>
    </div>
</div>