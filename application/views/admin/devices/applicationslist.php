	<div class="adminbody">
		<div class="col-sm-12">
			<div class="row">
				<div class="col-sm-12">
					<h1><?php echo $title; ?></h1>
				</div>
			</div>
			<hr />
<?php echo $appmsg; ?>
			<div class="table-responsive">
			<table class="table table-collapse table-striped table-hover">
				<thead>
					<tr>
						<th>No.</th>
						<th>Application ID</th>
						<th>Name</th>
						<th>Home Address</th>
						<th>Cellphone</th>
						<th>Email Address</th>
						<th class="actions">Action</th>
					</tr>
				</thead>
				<tbody>
<?php
if (!empty($applicationslist)):
$i = 1;
foreach ($applicationslist as $applicant):
?>
					<tr>
						<td><?php echo $i++; ?></td>
						<td><?php echo $applicant['registration_id']; ?></td>
						<td><?php echo $applicant['last_name'].', '.$applicant['first_name'].' '.$applicant['middle_name']; ?></td>
						<td><?php echo $applicant['home_address']; ?></td>
						<td><?php echo $applicant['cellphone']; ?></td>
						<td><?php echo $applicant['email_address']; ?></td>
						<td><div class="btn-group"><a class="btn btn-sm btn-default glyphicon glyphicon-eye-open" title="View Information" href="<?php echo base_url('admin/applications/view/'.$applicant['registration_id']); ?>"></a><a class="btn btn-sm btn-default glyphicon glyphicon-ok apprec" title="Approve" href="<?php echo base_url('admin/applications/approve/'.$applicant['registration_id']); ?>"></a><a class="btn btn-sm btn-default glyphicon glyphicon-remove rejrec" title="Reject" href="<?php echo base_url('admin/applications/reject/'.$applicant['registration_id']); ?>"></div></td>
					</tr>
<?php endforeach; endif; ?>
				</tbody>
			</table>
			</div>
		</div>
	</div>
