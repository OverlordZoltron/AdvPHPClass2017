<h1 class="text-center">Upload a file</h1>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <form enctype="multipart/form-data" action="#" method="POST">
                <!-- MAX_FILE_SIZE must precede the file input field -->
                <!-- <input type="hidden" name="MAX_FILE_SIZE" value="30000" /> -->
                <!-- Name of input element determines name in $_FILES array -->
                Send this file: <input name="upfile" type="file" />
                <input type="submit" value="Send File" />
            </form>
        </div>
    </div>
</div>
