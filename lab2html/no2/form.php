<!doctype html>
<html>
<head>
<meta name="author" content="Banchar Paseelatesang">
<meta name="description" content="Echo Form Data">
<meta charset="utf-8">
<title>form echo</title>
<style>
	table { width: 450px; border: solid 1px gray; border-collapse: collapse; font: 16px tahoma; }
	caption { font: bold 18px tahoma; color: brown; }
	th:first-child { width: 30%; }
	th:last-child { width: 70%; }
	td:first-child { background: #cdf; }
	th { background: gray; color: white; }
	td, th { border: solid 1px  navy; padding: 3px; vertical-align: top; }
</style>
</head>

<body>
<?php
if($_REQUEST || $_FILES) { 
?>
<table>
<caption>Form Data</caption>
<tr><th>Name</th><th>Data</th></tr>
<?php
	foreach($_REQUEST as $key => $value) {
		if(is_array($value)) {
			foreach($value as $v) {
				$v = stripslashes($v);
				echo "<tr><td>$key</td><td>$v</td></tr>";
			}
			continue;
		}
		$value = stripslashes($value);
		echo "<tr><td>$key</td><td>$value</td></tr>";
	}
	
	foreach($_FILES as $key => $value) {
		$value = "File (" . $_FILES[$key]['type'] . ")(" . $_FILES[$key]['name'] . ")";
		echo "<tr>	<td>$key</td><td>$value</td></tr>";
	}	
?>
</table>

<?php
}
?>
<!-- Code injected by live-server -->
<script>
	// <![CDATA[  <-- For SVG support
	if ('WebSocket' in window) {
		(function () {
			function refreshCSS() {
				var sheets = [].slice.call(document.getElementsByTagName("link"));
				var head = document.getElementsByTagName("head")[0];
				for (var i = 0; i < sheets.length; ++i) {
					var elem = sheets[i];
					var parent = elem.parentElement || head;
					parent.removeChild(elem);
					var rel = elem.rel;
					if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
						var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
						elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
					}
					parent.appendChild(elem);
				}
			}
			var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
			var address = protocol + window.location.host + window.location.pathname + '/ws';
			var socket = new WebSocket(address);
			socket.onmessage = function (msg) {
				if (msg.data == 'reload') window.location.reload();
				else if (msg.data == 'refreshcss') refreshCSS();
			};
			if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
				console.log('Live reload enabled.');
				sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
			}
		})();
	}
	else {
		console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
	}
	// ]]>
</script>
</body>
</html>