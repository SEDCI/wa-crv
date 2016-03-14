<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE-edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="robots" content="noindex, nofollow">
	<title><?php echo $title; ?> | SEDCI Remote CCTV API</title>

	<style type="text/css">
		body {
			margin: 0px;
		}
		iframe {
			width: 100%;
			height: 100%;
			border: 0px;
		}
	</style>
</head>
<body>
	<iframe class="deviceview" src="<?php echo 'http://'.$device['ip_address'].':'.$device['port']; ?>"></iframe>
</body>
</html>