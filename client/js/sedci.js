/* SEDCI DDNS UPDATER JS */

$(function(){
	$('#connect').click(function(){
		var uname = $('#uname').val();
		var passw = $('#passw').val();

		$(this).attr("disabled", "true");
		$('#status').html('Connecting...');
		$('#uname').attr("disabled", "true");
		$('#passw').attr("disabled", "true");

        $.ajax({
            url: 'http://southeasterndatacenter.com/api/remotecctv/clientapp/auth',
            data: { 'username' : uname, 'password' : passw },
            dataType: 'jsonp',
            jsonp: 'callback',
            jsonpCallback: 'loginClient'
        });
	});

	$('#disconnect').click(function(){
		deleteCookie('user_key');
		location.reload();
	});

	$('#autoupdate').click(function(){
		$('#frequency').attr('disabled', !this.checked);
	});

	$('#applysettings').click(function(){
		var frequency;
		var devices = {};
		var devices_json;
		var tf;

		if ($('#autoupdate').is(':checked')) {
			frequency = ($('#frequency').val() * 60) * 60;
			setCookie('updatefrequency', frequency, 365);
		} else {
			deleteCookie('updatefrequency');
		}

		$('.devices [type="checkbox"]').each(function(){
			tf = $(this).is(':checked') ? 'true' : 'false';
			devices[$(this).val()] = tf;
		});

		devices_json = JSON.stringify(devices);

		setCookie('devices', devices_json, 365);
	});

	$('#updateip').click(function(){
		if (getCookie('devices') && getCookie('user_key')) {
			var user_key = getCookie('user_key');
			var devices_arr = JSON.parse(getCookie('devices'));
			var devices_to_update = '';

			for (var key in devices_arr) {
				if (devices_arr[key] == 'true') {
					devices_to_update += (key + ':');
				}
			}

			devices = devices_to_update.substring(0, devices_to_update.length - 1);

			$('#updatestatus').html('Updating...');

	        $.ajax({
	            url: 'http://southeasterndatacenter.com/api/remotecctv/key/' + user_key + '/devices/updateip/' + devices,
	            dataType: 'jsonp',
	            jsonp: 'callback',
	            jsonpCallback: 'updateDevices'
	        });
		}
		else {
			$('#updatestatus').html('Update Failed. Check settings or reconnect.');
		}
	});

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
});

function loginClient(data){
	if (data) {
		if (data.response_status == '200') {
			setCookie('user_key', data.user_key, 7);
			location.reload();
		}
		else {
			$('#status').html('Login Failed');
		}
	}
	else {
		$('#status').html('Unable to Connect');
	}

	$('button').removeAttr("disabled");
	$('#uname').removeAttr("disabled");
	$('#passw').removeAttr("disabled");
}

function autoUpdatedevices(data){
	if (data) {
		if (data.response_status == '200') {
			var last_update = new Date(getCookie('last_update_iso')).getTime();
			var current_date = new Date(data.server_time).getTime();
			var time_diff = (current_date - last_update) / 1000;

			if (time_diff >= getCookie('updatefrequency')) {
				$('#updateip').click();
			}
		}
	}
}

function updateDevices(data){
	if (data) {
		if (data.response_status == '200') {
			$('#updatestatus').html('Last Update: ' + data.last_update);
			setCookie('last_update', data.last_update, 365);
			setCookie('last_update_iso', data.last_update_iso, 365);
		}
		else {
			$('#updatestatus').html('Update Failed');
		}
	}
	else {
		$('#updatestatus').html('Unable to Connect');
	}
}

function setCookie(cname, cvalue, exdays) {
	var d = new Date();
	d.setTime(d.getTime() + (exdays*24*60*60*1000));
	var expires = "expires="+d.toUTCString();
	document.cookie = cname + "=" + cvalue + "; " + expires;
}

function deleteCookie(cname) {
	var expires = "expires=Thu, 01 Jan 1970 00:00:00 UTC";
	document.cookie = cname + "=" + "; " + expires;
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(name) == 0) return c.substring(name.length,c.length);
    }
    return "";
}
