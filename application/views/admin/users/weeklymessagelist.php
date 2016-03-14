	<div class="adminbody">
		<div class="col-sm-12">
			<div class="row">
				<div class="col-sm-8">
					<h1><?php echo $title; ?></h1>
				</div>
				<div class="col-sm-4 text-right main-btn">
					<a class="btn btn-success" title="Add Weekly Message" href="<?php echo base_url('admin/pages/weeklymessage/add'); ?>"><span class="glyphicon glyphicon-plus"></span> Add Weekly Message</a>
				</div>
			</div>
			<hr />
<?php echo $pagemsg; ?>
			<div class="table-responsive">
			<table class="table table-collapse table-striped table-hover">
				<thead>
					<tr>
						<th>No.</th>
						<th>Verse</th>
						<th>Message</th>
						<th>Files</th>
						<th>Date Added</th>
						<th>Comments</th>
						<th class="actions">Action</th>
					</tr>
				</thead>
				<tbody>
<?php
if (!empty($allmessages)):
$i = 1;
foreach ($allmessages as $message):
?>
					<tr>
						<td><?php echo $i++; ?></td>
						<td><?php echo $message['verse']; ?></td>
						<td><?php echo $message['content']; ?></td>
						<td>
<?php if (!empty($message['ppt_file'])) : ?>
							<div class="row">
								<div class="col-sm-12">
									<a href="<?php echo base_url('files/weeklymessage/'.$message['ppt_file']); ?>" target="_blank"><?php echo $message['ppt_file']; ?></a>
								</div>
							</div>
<?php endif; ?>
<?php if (!empty($message['ios_file'])) : ?>
							<div class="row">
								<div class="col-sm-12">
									<a href="<?php echo base_url('files/weeklymessage/'.$message['ios_file']); ?>" target="_blank"><?php echo $message['ios_file']; ?></a>
								</div>
							</div>
<?php endif; ?>
<?php if (!empty($message['pdf_file'])) : ?>
							<div class="row">
								<div class="col-sm-12">
									<a href="<?php echo base_url('files/weeklymessage/'.$message['pdf_file']); ?>" target="_blank"><?php echo $message['pdf_file']; ?></a>
								</div>
							</div>
<?php endif; ?>
						</td>
						<td><?php echo date('F j, Y', strtotime($message['date_added'])); ?></td>
						<!--<td><a href="#" data-toggle="modal" data-target="#commentslist"><?php echo $message['comments_count']; ?></a></td>-->
						<td><?php echo $message['comments_count']; ?></td>
						<td><div class="btn-group"><a class="btn btn-sm btn-default glyphicon glyphicon-eye-open" title="View Information" href="<?php echo base_url('admin/pages/weeklymessage/view/'.$message['id']); ?>"></a><a class="btn btn-sm btn-default glyphicon glyphicon-pencil" title="Edit" href="<?php echo base_url('admin/pages/weeklymessage/edit/'.$message['id']); ?>"></a><a class="btn btn-sm btn-default glyphicon glyphicon-trash delrec" title="Delete" href="<?php echo base_url('admin/pages/weeklymessage/delete/'.$message['id']); ?>"></div></td>
					</tr>
<?php endforeach; endif; ?>
				</tbody>
			</table>
			</div>
		</div>
	</div>

	<div class="modal" id="commentslist" tabindex="-1" role="dialog" aria-labelledby="modaltitle">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="modaltitle">Comments</h4>
				</div>
				<div class="modal-body">
				</div>
			</div>
		</div>
	</div>
