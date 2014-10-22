<?php
require "scripts/php/login.php";
$logged_in = false;

if(isset($_COOKIE['uid'])){
	$logged_in = true;
	echo 'Logged in.';
} else{
	echo 'Not logged in.';
	if(isset($_GET['login'])){
		echo 'Validating.';
		//TODO form valdation
		
		$uid = check_login($_POST['username'],sha1($_POST['password']));
		echo sha1($_POST['password']);
		if($uid != 0){
			setcookie("uid","{$uid}",time()+3600*14,"/",".phantastyc.tk");
		} else{
			echo 'Incorrect passwd.';
		}
	}
}

if(isset($_POST['logout'])){
	unset($_COOKIE['uid']);
}

?>

<!DOCTYPE html>
<html>
<head>
<title>News Feed Devlopment</title>
</head>

<body>
<?php 
	if($logged_in){
?>
    <div id="ucp">
    	<h2>Hiya User number<?php echo $_COOKIE['uid']?></h2>
    	<button type="submit" id="logout" name="logout">Logout</button>
    </div>
<?php
	} else {
?>
	<div id="login">
    	<form method="post" action="?login">
        	<label for="username">Username or Email:</label>
            <input type="text" name="username">
            <label for="password">Password:</label>
            <input type="password" name="password">
            <input type="submit" value="Login">
        </form>
    </div>
<?php
	}
?>

</body>
</html>