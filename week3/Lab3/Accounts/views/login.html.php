<h1 class="text-center">Login</h1>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <form action="#" method="post" class="form-horizontal">
                <div class="form-group">
                    <label class="control-label col-sm-3" for="email">Email:</label>
                    <div class="col-sm-9">
                        <input name="email" class="form-control" value="<?php echo $email; ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="password">Password:</label>
                    <div class="col-sm-9">
                        <input name="password" type="password" class="form-control" value="" />
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-2 col-sm-offset-10">
                        <input type="submit" value="Submit" class="btn btn-primary" />
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>