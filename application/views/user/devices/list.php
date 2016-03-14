	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12">
				<h2><?php echo $title; ?></h2>
<?php echo $alert; ?>
				<div class="well">
					<?php echo form_open('devices/updateip'); ?>
					<a class="btn btn-default" title="Add Device" href="<?php echo base_url('devices/add'); ?>"><span class="glyphicon glyphicon-plus"></span> Add</a> <button type="submit" class="btn btn-default updateip" title="Update IP">Update IP</button> <span class="glyphicon glyphicon-question-sign note" data-toggle="modal" data-target="#note"></span>
					<div class="panel panel-default">
						<div class="table-responsive">
							<table class="table table-collapse table-striped table-hover">
								<thead>
									<tr>
										<th><input type="checkbox" id="checkall" /></th>
										<th>No.</th>
										<th>Name</th>
										<th>IP Address</th>
										<th>Port</th>
										<th>Date Added</th>
										<th>Status</th>
										<th>Date Updated</th>
										<th class="actions">Action</th>
									</tr>
								</thead>
								<tbody>
<?php
if (!empty($devices)):
$i = 1;
foreach ($devices as $device):
?>
									<tr>
										<td><input type="checkbox" id="<?php echo $device['id']; ?>" name="device[]" value="<?php echo $device['name']; ?>" /></td>
										<td><?php echo $i++; ?></td>
										<td><a href="<?php echo base_url('devices/'.$device['name']); ?>" target="_blank"><?php echo $device['name']; ?></a></td>
										<td><?php echo $device['ip_address']; ?></td>
										<td><?php echo $device['port']; ?></td>
										<td><?php echo date('F j, Y', strtotime($device['date_added'])); ?></td>
										<td><?php echo ($device['status'] == 'A') ? 'Active' : 'Inactive'; ?></td>
										<td><?php echo date('F j, Y', strtotime($device['date_updated'])); ?></td>
										<td><div class="btn-group"><a class="btn btn-sm btn-default glyphicon glyphicon-pencil" title="Edit" href="<?php echo base_url('devices/edit/'.$device['id']); ?>"></a><a class="btn btn-sm btn-default glyphicon glyphicon-trash delrec" title="Delete" href="<?php echo base_url('devices/delete/'.$device['id']); ?>"></div></td>
									</tr>
<?php endforeach; endif; ?>
								</tbody>
							</table>
						</div>
					</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="modal" id="note" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Update IP</h4>
				</div>
				<div class="modal-body">
					<p>This function updates the public IP of the devices based on your current internet connection. Use this only when you are on the same network as your devices.</p>
				</div>
			</div>
		</div>
	</div>