	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12">
				<h2><?php echo $title; ?></h2>
<?php echo $alert; ?>
				<div class="well">
					<a class="btn btn-default" title="Add User" href="<?php echo base_url('admin/users/add'); ?>"><span class="glyphicon glyphicon-plus"></span> Add</a>
					<div class="panel panel-default">
						<div class="table-responsive">
							<table class="table table-collapse table-striped table-hover">
								<thead>
									<tr>
										<th>No.</th>
										<th>Username</th>
										<th>Name</th>
										<th>Company</th>
										<th>Email</th>
										<th>Key</th>
										<th>Date Registered</th>
										<th>Status</th>
										<th class="actions">Action</th>
									</tr>
								</thead>
								<tbody>
<?php
if (!empty($users)):
$i = 1;
foreach ($users as $user):
?>
									<tr>
										<td><?php echo $i++; ?></td>
										<td><?php echo $user['username']; ?></td>
										<td><?php echo $user['first_name'].' '.$user['last_name']; ?></td>
										<td><?php echo $user['company']; ?></td>
										<td><?php echo $user['email']; ?></td>
										<td><?php echo $user['user_key']; ?></td>
										<td><?php echo date('F j, Y', strtotime($user['date_registered'])); ?></td>
										<td><?php echo ($user['status'] == 'A') ? 'Active' : 'Inactive'; ?></td>
										<td><div class="btn-group"><a class="btn btn-sm btn-default glyphicon glyphicon-pencil" title="Edit" href="<?php echo base_url('admin/users/edit/'.$user['id']); ?>"></a><a class="btn btn-sm btn-default glyphicon glyphicon-trash delrec" title="Delete" href="<?php echo base_url('admin/users/delete/'.$user['id']); ?>"></div></td>
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
