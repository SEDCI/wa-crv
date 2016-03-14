    <div class="adminbody">
        <div class="col-sm-12 memberinfo">
            <div class="row">
                <div class="col-sm-8">
                    <h1><?php echo $title; ?></h1>
                </div>
                <div class="col-sm-4 text-right main-btn">
                    <a class="btn btn-default" title="Back to List" href="<?php echo base_url('admin/pages/weeklymessage'); ?>"><< Back to List</a>
                </div>
            </div>
            <hr />
<?php echo (!empty($pagemsg)) ? $pagemsg : ''; ?>
            <?php echo form_open_multipart('admin/pages/weeklymessage/edit/'.$wmid); ?>
                <input type="hidden" id="wmid" name="wmid" value="<?php echo $wmid; ?>">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="wmverse" class="control-label">Verse:</label>
                            <input type="text" class="form-control" id="wmverse" name="wmverse" placeholder="Enter Verse" value="<?php echo set_value('wmverse', $message['verse']); ?>" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="wmmessage" class="control-label">Message:</label>
                            <textarea class="form-control" id="wmmessage" name="wmmessage" placeholder="Enter Message"><?php echo set_value('wmmessage', $message['content']); ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h3>Downloadable Presentations</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Powerpoint:</label>
<?php if ($message['ppt_file']): ?>
                            <div class="current-file" id="ppt"><span>Current File: </span><a href="<?php echo base_url('files/weeklymessage/'.$message['ppt_file']); ?>" target="_blank"><?php echo $message['ppt_file']; ?></a>&nbsp;&nbsp;<a href="#" class="remove-file" title="Remove File"><span class="glyphicon glyphicon-remove"></span></a></div>
<?php else: ?>
                            <input type="file" id="wmfileppt" name="wmfileppt" />
<?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>iOS:</label>
<?php if ($message['ios_file']): ?>
                            <div class="current-file" id="ios"><span>Current File: </span><a href="<?php echo base_url('files/weeklymessage/'.$message['ios_file']); ?>" target="_blank"><?php echo $message['ios_file']; ?></a>&nbsp;&nbsp;<a href="#" class="remove-file" title="Remove File"><span class="glyphicon glyphicon-remove"></span></a></div>
<?php else: ?>
                            <input type="file" id="wmfileios" name="wmfileios" />
<?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>PDF:</label>
<?php if ($message['pdf_file']): ?>
                            <div class="current-file" id="pdf"><span>Current File: </span><a href="<?php echo base_url('files/weeklymessage/'.$message['pdf_file']); ?>" target="_blank"><?php echo $message['pdf_file']; ?></a>&nbsp;&nbsp;<a href="#" class="remove-file" title="Remove File"><span class="glyphicon glyphicon-remove"></span></a></div>
<?php else: ?>
                            <input type="file" id="wmfilepdf" name="wmfilepdf" />
<?php endif; ?>
                        </div>
                    </div>
                </div>
                <br />
                <div class="row info-rows">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary">Save Message</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
