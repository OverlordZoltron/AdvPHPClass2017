<h2 class="text-center">Uploaded Files</h2>

<?php $counter = 1;?>
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
                <td><a href="read-file.php?filename=<?php echo $fileInfo->getFilename(); ?>">Details</a></td>
                <td><a href="?deleteFile=<?php echo $fileInfo->getFilename(); ?>" class="btn-danger">Delete</a></td>
            </tr>
        <?php endif; ?>
    <?php endforeach; ?>
</table>

