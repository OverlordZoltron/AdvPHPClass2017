<?php if (isset($errors) && is_array($errors)) : ?>
    <div class="row">
        <div class="col-md-3 col-md-offset-5">
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li class="bg-danger"><?php echo $error; ?></li>
                    <?php endforeach; ?>
            </ul>
        </div>
    </div>
<?php endif; ?>