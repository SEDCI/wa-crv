<?php
//if (isset($_COOKIE['updatefrequency'])) {
//	header('refresh: '.$_COOKIE['updatefrequency']);
//}

function sec_to_hr($secs) {
	return ($secs / 60) / 60;
}

function curl_get($url) {
	$ch = curl_init();
	$curl_options = array(
		CURLOPT_URL => $url,
		CURLOPT_RETURNTRANSFER => 1
	);

	curl_setopt_array($ch, $curl_options);

	$result = curl_exec($ch);

	curl_close($ch);

	return json_encode($result);
}

include('header.php');

if (empty($_COOKIE['user_key'])) {
	include('login.php');
} else {
	if (!isset($_GET['p'])) {
		include('updater.php');
	} else {
		switch ($_GET['p']) {
			case 'settings':
				if (empty($_COOKIE['updatefrequency'])) {
					$frequency = 24;
					$autoupdate = '';
					$disabled_frequency = 'disabled="disabled"';
				} else {
					$frequency = sec_to_hr($_COOKIE['updatefrequency']);
					$autoupdate = 'checked="checked"';
					$disabled_frequency = '';
				}

				if (empty($_COOKIE['devices'])) {
					$devices_url = 'http://localhost/rocky/api/remotecctv/key/'.$_COOKIE['user_key'].'/devices';

					$devices = json_decode(json_decode(curl_get($devices_url)), true);

					foreach ($devices as $device) {
						$arr_devices[$device['name']] = 'false';
					}

					$_COOKIE['devices'] = json_encode($arr_devices);
				}

				$devices = json_decode($_COOKIE['devices'], true);

				include('settings.php');
				break;
		}
	}
}

include('footer.php'); 
?>
<!--<script type="text/javascript">
document.cookie = "user_key=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
</script>-->