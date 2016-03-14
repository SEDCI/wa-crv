    <div class="adminbody">
        <div class="col-sm-12 memberinfo">
            <div class="row">
                <div class="col-sm-8">
                    <h1><?php echo $title; ?></h1>
                </div>
                <div class="col-sm-4 text-right main-btn">
                    <a class="btn btn-default" title="Back to List" href="<?php echo base_url('admin/pages/weeklymessage'); ?>"><< Back to List</a> <a class="btn btn-warning" href="<?php echo base_url('admin/pages/weeklymessage/edit/'.$message_id); ?>"><span class="glyphicon glyphicon-pencil"></span> Edit</a> <a class="btn btn-danger delrec" href="<?php echo base_url('admin/pages/weeklymessage/delete/'.$message_id); ?>"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                </div>
            </div>
            <hr />
            <!--<input type="hidden" id="wmid" name="wmid" value="<?php echo $wmid; ?>">-->
            <div class="row">
                <div class="col-sm-12">
                    <label class="control-label">Verse:</label>
                    <p><?php echo $message['verse']; ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <label class="control-label">Message:</label>
                    <p><?php echo $message['content']; ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <h3>Downloadable Presentations</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <label>Powerpoint:</label>
                    <div class="current-file" id="ppt"><span>Current File: </span>
<?php if ($message['ppt_file']): ?>
                        <a href="<?php echo base_url('files/weeklymessage/'.$message['ppt_file']); ?>" target="_blank"><?php echo $message['ppt_file']; ?></a>
<?php else: ?>
                        <span>N/A</span>
<?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <label>iOS:</label>
                    <div class="current-file" id="ios"><span>Current File: </span>
<?php if ($message['ios_file']): ?>
                        <a href="<?php echo base_url('files/weeklymessage/'.$message['ios_file']); ?>" target="_blank"><?php echo $message['ios_file']; ?></a>
<?php else: ?>
                        <span>N/A</span>
<?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <label>PDF:</label>
                    <div class="current-file" id="pdf"><span>Current File: </span>
<?php if ($message['pdf_file']): ?>
                        <a href="<?php echo base_url('files/weeklymessage/'.$message['pdf_file']); ?>" target="_blank"><?php echo $message['pdf_file']; ?></a>
<?php else: ?>
                        <span>N/A</span>
<?php endif; ?>
                    </div>
                </div>
            </div>
            <br />
            <div class="row">
                <div class="col-sm-12">
                    <h3>Comments</h3>
                </div>
            </div>
<?php
if (!empty($comments)):
foreach($comments as $comment):
?>
            <div class="wm-comment">
                <div class="row">
                    <div class="col-sm-12">
                        <label><a href="<?php echo base_url('admin/members/view/'.$comment['membership_id']); ?>" target="_blank"><?php echo $comment['first_name'].' '.$comment['last_name']; ?></a></label> <span class="comment-date">(<?php echo date('F j, Y H:i A', strtotime($comment['date_commented'])); ?>)</span>&nbsp;&nbsp;<a href="<?php echo base_url('admin/pages/weeklymessage/comments/delete/'.$comment['id']); ?>" class="remove-comment" title="Remove Comment"><span class="glyphicon glyphicon-remove"></span></a>
                            <!--<a class="pull-right" href="#" title="Delete Comment"><span class="glyphicon glyphicon-remove"></span></a>-->
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <p><?php echo $comment['comment']; ?></p>
                        <input type="hidden" class="wmcid" value="<?php echo $comment['id']; ?>">
                    </div>
                </div>
            </div>
<?php
endforeach;
else:
?>
            <div class="wm-comment">
                <div class="row">
                    <div class="col-sm-12">
                        <label>No comments.</label>
                    </div>
                </div>
            </div>
<?php endif; ?>
        </div>
    </div>
