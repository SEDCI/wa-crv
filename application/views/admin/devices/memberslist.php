	<div class="adminbody">
		<div class="col-sm-12">
			<div class="row">
				<div class="col-sm-8">
					<h1><?php echo $title; ?></h1>
				</div>
				<div class="col-sm-4 text-right main-btn">
					<a class="btn btn-success" title="Add Member" href="<?php echo base_url('admin/members/add'); ?>"><span class="glyphicon glyphicon-plus"></span> Add Member</a>
				</div>
			</div>
			<hr />
<?php echo $memmsg; ?>
			<div class="table-responsive">
			<table class="table table-collapse table-striped table-hover">
				<thead>
					<tr>
						<th>No.</th>
						<th>Membership ID</th>
						<th>Name</th>
						<th>Home Address</th>
						<th>Cellphone</th>
						<th>Email Address</th>
						<th class="actions">Action</th>
					</tr>
				</thead>
				<tbody>
<?php
if (!empty($memberslist)):
$i = 1;
foreach ($memberslist as $member):
?>
					<tr>
						<td><?php echo $i++; ?></td>
						<td><?php echo $member['membership_id']; ?></td>
						<td><?php echo $member['last_name'].', '.$member['first_name'].' '.$member['middle_name']; ?></td>
						<td><?php echo $member['home_address']; ?></td>
						<td><?php echo $member['cellphone']; ?></td>
						<td><?php echo $member['email_address']; ?></td>
						<td><div class="btn-group"><a class="btn btn-sm btn-default glyphicon glyphicon-eye-open" title="View Information" href="<?php echo base_url('admin/members/view/'.$member['membership_id']); ?>"></a><a class="btn btn-sm btn-default glyphicon glyphicon-pencil" title="Edit" href="<?php echo base_url('admin/members/edit/'.$member['membership_id']); ?>"></a><a class="btn btn-sm btn-default glyphicon glyphicon-trash delrec" title="Delete" href="<?php echo base_url('admin/members/delete/'.$member['membership_id']); ?>"></div></td>
					</tr>
<?php endforeach; endif; ?>
				</tbody>
			</table>
			</div>
		</div>
	</div>
