    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-5">
                <h2><?php echo $title; ?></h2>
<?php echo (!empty($alert)) ? $alert : ''; ?>
                <div class="well">
                    <?php echo form_open('admin/devices/edit/'.$id); ?>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="client" class="control-label">Client:</label>
                                    <?php echo form_dropdown('client', $users_dropdown, set_value('client', $device['user_id']), 'id="client" class="form-control"'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="devicename" class="control-label">Name:</label>
                                    <input type="text" class="form-control" id="devicename" name="devicename" placeholder="Enter Device Name" value="<?php echo set_value('devicename', $device['name']); ?>" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="ipadd" class="control-label">IP Address:</label>
                                    <input type="text" class="form-control" id="ipadd" name="ipadd" placeholder="Enter IP Address" value="<?php echo set_value('ipadd', $device['ip_address']); ?>" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="port" class="control-label">Port:</label>
                                    <input type="text" class="form-control" id="port" name="port" placeholder="Enter Port" value="<?php echo set_value('port', $device['port']); ?>" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Active:</label>&nbsp;
                                    <input type="checkbox" id="status" name="status" value="A" <?php echo ($device['status'] == 'A') ? 'checked' : ''; ?> />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 text-right">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" role="button">Save</button>
                                    <a class="btn btn-default" href="<?php echo base_url('admin/devices'); ?>">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
