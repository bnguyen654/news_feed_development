<?php
require "scripts/php/login.php";

$logged_in = false;

if(isset($_COOKIE['nfd_sessid']) && isset($_COOKIE['nfd_uid'])){
	if(verify($_COOKIE['nfd_sessid'])){
		session_id($_COOKIE['nfd']);
		session_start();
		$logged_in = true;
	}
}
?>

<!DOCTYPE html>
<html>
<head>
<title>News Feed Devlopment</title>
<script src="scripts/js/jquery-2.1.1.min.js"></script>
</head>

<body>
	<div id="ucp">
    </div>
</body>
</html>