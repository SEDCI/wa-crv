	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12">
				<h2>Overview</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-8">
				<div class="row">
					<div class="col-sm-4">
						<div class="box">
							<div class="box-header">
								<b>Registered Devices</b>
							</div>
							<div class="box-content text-center">
								<canvas id="devices" width="200"></canvas>
								<span id="devices-legend"></span>
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="box">
							<div class="box-header">
								<b>Last Updated Devices</b>
							</div>
							<div class="box-content">
<?php foreach($devices as $device): ?>
								<p><?php echo $device['name'].' <span class="pull-right"><i>'.date('F j, Y', strtotime($device['date_updated'])).'</i></span>'; ?></p>
<?php endforeach; ?>
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="box">
							<div class="box-header">
								<b>Box 3</b>
							</div>
							<div class="box-content">
								Lorem ipsum
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-4">
			</div>
		</div>
	</div>
	<script src="<?php echo base_url('js/Chart.min.js'); ?>"></script>
	<script type="text/javascript">
		$(function(){
			var ctx = $('#devices').get(0).getContext('2d');
			var data = [
				{
					value: <?php echo $active; ?>,
					color: 'darkorange',
					highlight: 'orange',
					label: 'Active'
				},
				{
					value: <?php echo $inactive; ?>,
					color: '#DDDDDD',
					highlight: '#EAEAEA',
					label: 'Inactive'
				}
			];

			var options = {
				segmentShowStroke : false,
				percentageInnerCutout : 0,
				legendTemplate : "<ul class=\"chart-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
			};

			var piechart = new Chart(ctx).Pie(data, options);
			$('#devices-legend').html(piechart.generateLegend());
		});
	</script>