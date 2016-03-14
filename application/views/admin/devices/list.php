	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12">
				<h2><?php echo $title; ?></h2>
<?php echo $alert; ?>
				<div class="well">
					<a class="btn btn-default" title="Add Device" href="<?php echo base_url('admin/devices/add'); ?>"><span class="glyphicon glyphicon-plus"></span> Add</a>
					<div class="panel panel-default">
						<div class="table-responsive">
							<table class="table table-collapse table-striped table-hover">
								<thead>
									<tr>
										<th>No.</th>
										<th>Client</th>
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
										<td><?php echo $i++; ?></td>
										<td><?php echo (!empty($device['company'])) ? $device['client_name'].' ('.$device['company'].')' : $device['client_name']; ?></td>
										<td><a href="<?php echo base_url('admin/devices/view/'.$device['name']); ?>" target="_blank"><?php echo $device['name']; ?></a></td>
										<td><?php echo $device['ip_address']; ?></td>
										<td><?php echo $device['port']; ?></td>
										<td><?php echo date('F j, Y', strtotime($device['date_added'])); ?></td>
										<td><?php echo ($device['status'] == 'A') ? 'Active' : 'Inactive'; ?></td>
										<td><?php echo date('F j, Y', strtotime($device['date_updated'])); ?></td>
										<td><div class="btn-group"><a class="btn btn-sm btn-default glyphicon glyphicon-pencil" title="Edit" href="<?php echo base_url('admin/devices/edit/'.$device['id']); ?>"></a><a class="btn btn-sm btn-default glyphicon glyphicon-trash delrec" title="Delete" href="<?php echo base_url('admin/devices/delete/'.$device['id']); ?>"></div></td>
									</tr>
<?php endforeach; endif; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
