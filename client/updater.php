<script type="text/javascript">
	if (getCookie('updatefrequency')) {
        $.ajax({
            url: 'http://southeasterndatacenter.com/api/remotecctv/key/' + getCookie('user_key') + '/servertime',
            dataType: 'jsonp',
            jsonp: 'callback',
            jsonpCallback: 'autoUpdatedevices'
        });

		setInterval(function(){
			$('#updateip').click();
		}, getCookie('updatefrequency') * 1000);
	}
</script>
<body>
	<div class="blue"></div>
	<table class="main-table">
		<tr>
			<td class="logo-container" align="center"><img src="img/sedc_icon.png"></td>
			<td align="center">
				<h3>SEDCI DDNS Updater</h3>
				<div class="container-box" id="updatestatus">
					<?php echo isset($_COOKIE['last_update']) ? 'Last Update: '.$_COOKIE['last_update'] : 'Not yet updated.'; ?>
				</div>
				<br />
				<a href="#" id="updateip">Update IP</a> | <a href="?p=settings">Settings</a> | <a href="#" id="disconnect">Disconnect</a>
			</td>
		</tr>
	</table>
	<div class="blue"></div>
</body>
