<h1 class="text-center">Add Address</h1>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <form action="#" method="post" class="form-horizontal">
                <div class="form-group">
                    <label class="control-label col-sm-3" for="fullname">Full Name:</label>
                    <div class="col-sm-9">
                        <input name="fullname" class="form-control" placeholder="Full Name" value="<?php echo $fullname; ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="email">Email:</label>
                    <div class="col-sm-9">
                        <input name="email" class="form-control" placeholder="Enter an Email" value="<?php echo $email; ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="address1">Address1:</label>
                    <div class="col-sm-9">
                        <input name="addressline1" class="form-control" placeholder="Enter an Address" value="<?php echo $addressline1; ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="city">City:</label>
                    <div class="col-sm-9">
                        <input name="city" class="form-control" placeholder="Enter a City" value="<?php echo $city; ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="email">State:</label>
                    <div class="col-sm-9">
                        <select name="state" class="form-control">
                            <option value="" selected disabled>Select One...</option>
                            <?php foreach ($getStates as $key => $value): ?> 
                                <option value="<?php echo $key; ?>" <?php if ($state == $key): ?> selected="selected" <?php endif; ?>><?php echo $value; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="zip">Zip:</label>
                    <div class="col-sm-9">
                        <input name="zip" class="form-control" placeholder="Please enter Zip Code" value="<?php echo $zip; ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="email">Birthday:</label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control" name="birthday" value="<?php echo $birthday; ?>" />
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

