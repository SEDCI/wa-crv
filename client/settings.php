<body>
	<div class="blue"></div>
	<table class="main-table" cellpadding="0" cellspacing="0">
		<tr>
			<td valign="top" width="100">
				<div class="menu">
					<img src="img/sedc_icon.png" width="90">
					<br /><br />
					<div><a href="index.php">Updater</a></div>
					<div><a href="?p=settings">Settings</a></div>
				</div>
			</td>
			<td valign="top">
				<div class="content">
					<div class="title">Update Schedule</div>
					<div class="container-box">
						<table>
							<tr>
								<td><input type="checkbox" id="autoupdate" value="on" <?php echo $autoupdate; ?>></td>
								<td>Automatic Update: Every <input type="text" id="frequency" value="<?php echo $frequency; ?>" size="2" <?php echo $disabled_frequency; ?>> hour(s)</td>
							</tr>
						</table>
					</div>
					<div class="title">Devices to Update</div>
					<div class="container-box devices">
						<table>
<?php foreach($devices as $k => $v): ?>
							<tr>
								<td><input type="checkbox" value="<?php echo $k; ?>" <?php echo ($v == 'true') ? 'checked="checked"' : ''; ?>></td>
								<td><?php echo $k; ?></td>
							</tr>
<?php endforeach; ?>
						</table>
					</div>
					<div class="btn-group"><button type="button" id="applysettings">Apply</button></div>
				</div>
			</td>
		</tr>
	</table>
	<div class="blue"></div>
</body>
