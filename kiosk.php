<?php

if (isset($_POST['submit'])){
	if ($_POST['submit']=='console'){
		$cmd='xterm';
		$ret=exec($cmd, $out);
	}

	if ($_POST['submit']=='reboot'){
		$cmd='sudo reboot';
		$ret=exec($cmd, $out);
	}
	if ($_POST['submit']=='shutdown'){
		$cmd='sudo shutdown -h now';
		$ret=exec($cmd, $out);
	}
}

// get ip address
$cmd='hostname -I';
$ret=exec($cmd, $out);
$http_host=$out[0];

echo <<<eohtml
<html>
<head>
<style>
.formbutton {
	width: 100px;
	height: 50px;
}
</style>a
</head>
<body>
Raspberry Pi Menu:<br>
IP: {$http_host}<br>
<form name="frm" id="frm" method="post" action="">
<input class="formbutton" style="background-color: #F30;" name="submit" type="submit" value="console"><br>
<input class="formbutton" style="background-color: #F30;" name="submit" type="submit" value="reboot"><br>
<input class="formbutton" style="background-color: #F30;" name="submit" type="submit" value="shutdown"><br>
<input class="formbutton" name="submit" type="submit" value="reload"><br>
<a href="motivacation">motivacation</a>
</form>
</body>
</html>
eohtml;
?>
