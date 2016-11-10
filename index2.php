<?php
$stationfile = '/home/pi/.radiodb';
$stationtext = file($stationfile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

$station = array();
if ($stationtext !== FALSE) {
	foreach ($stationtext as $line) {
		$a = preg_split('/\s+/', $line, 2, PREG_SPLIT_NO_EMPTY);
		if (count($a) == 2) {
			list($id, $url) = $a;
			$station[$id] = $url;
		}
	}
}

header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" media="screen" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

		<title>Minimum Bootstrap HTML Skeleton</title>

		<!--  -->

		<style>
			.starter-template {
				padding: 40px 15px;
				text-align: center;
			}
		</style>

	</head>

	<body onload="tune()">
		<?php reset($station); ?>

		<div class="container">

			<div class="starter-template">
				<pre id="lcd"></pre>
			</div>

			<a href="#" class="btn btn-block btn-lg btn-danger" onclick="return tune('off')"><span class="glyphicon glyphicon-off"></span> Radio Off</a>
			<a href="#" class="btn btn-block btn-lg btn-primary"><span class="glyphicon glyphicon-volume-down"></span> Vol -</a>
			<a href="#" class="btn btn-block btn-lg btn-primary"><span class="glyphicon glyphicon-volume-up"></span> Vol +</a>
			<a href="#" class="btn btn-block btn-lg btn-primary"><span class="glyphicon glyphicon-volume-off"></span> Mute</a>

			<table class="table table-striped">
				<thead>
					<tr>
						<th>Firstname</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>John</td>
					</tr>
					<tr>
						<td>John</td>
					</tr>
					<tr>
						<td>John</td>
					</tr>
				</tbody>
			</table>

		</div><!-- /.container -->

		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>

		<script type="text/javascript">
			function ajax(url) {
				var req = new XMLHttpRequest();
				req.open("GET", url);
				req.onload = function() {
					document.getElementById("lcd").innerHTML = req.responseText;
				}
				req.send();
			}
			function tune(station) {
				ajax("tune.php?station=" + encodeURIComponent(station));
				return false;
			}
			function vol(adj) {
				ajax("vol.php?adj=" + encodeURIComponent(adj));
				return false;
			}
			function shutdown(arg) {
				ajax("shutdown.php?arg=" + encodeURIComponent(arg));
				return false;
			}
		</script>

	</body>

</html>
