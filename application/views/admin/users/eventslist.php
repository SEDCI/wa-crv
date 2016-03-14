	<div class="adminbody">
		<div class="col-sm-12">
			<div class="row">
				<div class="col-sm-8">
					<h1><?php echo $title; ?></h1>
				</div>
				<div class="col-sm-4 text-right main-btn">
					<a class="btn btn-success" title="Add Event" href="<?php echo base_url('admin/pages/events/add'); ?>"><span class="glyphicon glyphicon-plus"></span> Add Event</a>
				</div>
			</div>
			<hr />
<?php echo $pagemsg; ?>
			<div class="table-responsive">
			<table class="table table-collapse table-striped table-hover">
				<thead>
					<tr>
						<th>No.</th>
						<th>Date</th>
						<th>Event</th>
						<th>Date Added</th>
						<th class="actions">Action</th>
					</tr>
				</thead>
				<tbody>
<?php
if (!empty($allevents)):
$i = 1;
foreach ($allevents as $event):
?>
					<tr>
						<td><?php echo $i++; ?></td>
						<td><?php echo $event['event_date']; ?></td>
						<td><?php echo $event['event_content']; ?></td>
						<td><?php echo $event['date_added']; ?></td>
						<td><div class="btn-group"><a class="btn btn-sm btn-default glyphicon glyphicon-eye-open" title="View Event" href="<?php echo base_url('admin/pages/events/view/'.$event['id']); ?>"></a><a class="btn btn-sm btn-default glyphicon glyphicon-pencil" title="Edit" href="<?php echo base_url('admin/pages/events/edit/'.$event['id']); ?>"></a><a class="btn btn-sm btn-default glyphicon glyphicon-trash delrec" title="Delete" href="<?php echo base_url('admin/pages/events/delete/'.$event['id']); ?>"></div></td>
					</tr>
<?php endforeach; endif; ?>
				</tbody>
			</table>
			</div>
		</div>
	</div>
