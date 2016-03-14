    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-5">
                <h2><?php echo $title; ?></h2>
<?php echo (!empty($alert)) ? $alert : ''; ?>
                <div class="well">
                    <?php echo form_open('profile/edit'); ?>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="fname" class="control-label">First Name:</label>
                                    <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter First Name" value="<?php echo set_value('fname', $user['first_name']); ?>" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="lname" class="control-label">Last Name:</label>
                                    <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter Last Name" value="<?php echo set_value('lname', $user['last_name']); ?>" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="emailadd" class="control-label">E-mail Address:</label>
                                    <input type="text" class="form-control" id="emailadd" name="emailadd" placeholder="Ex. username@example.com" value="<?php echo set_value('emailadd', $user['email']); ?>" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="companyname" class="control-label">Company Name:</label>
                                    <input type="text" class="form-control" id="companyname" name="companyname" placeholder="Enter Company Name" value="<?php echo set_value('companyname', $user['company']); ?>" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 text-right">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" role="button">Update</button>
                                    <a class="btn btn-default" href="<?php echo base_url('profile'); ?>">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
