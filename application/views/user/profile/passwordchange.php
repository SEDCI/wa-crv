    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-5">
                <h2><?php echo $title; ?></h2>
<?php echo (!empty($alert)) ? $alert : ''; ?>
                <div class="well">
                    <?php echo form_open('profile/changepassword'); ?>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="opassw" class="control-label">Old Password:</label>
                                    <input type="password" class="form-control" id="opassw" name="opassw" placeholder="Enter Old Password" value="" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="npassw" class="control-label">New Password:</label>
                                    <input type="password" class="form-control" id="npassw" name="npassw" placeholder="Enter New Password" value="" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="cpassw" class="control-label">Confirm New Password:</label>
                                    <input type="password" class="form-control" id="cpassw" name="cpassw" placeholder="Confirm New Password" value="" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 text-right">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" role="button">Change Password</button>
                                    <a class="btn btn-default" href="<?php echo base_url('profile'); ?>">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
