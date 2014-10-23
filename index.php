<?php
require "scripts/php/login.php";
$logged_in = false;

if(isset($_COOKIE['uid'])){
	$logged_in = true;
} else{
	if(isset($_GET['login'])){
		echo 'Validating.';
		//TODO form valdation
		
		$uid = check_login($_POST['username'],sha1($_POST['password']));
		echo $uid;
		if($uid != 0){
			setcookie("uid",$uid,time()+3600*14,"/",".phantastyc.tk");
			header("Location: http://phantastyc.tk/feed");
		} else{
			echo 'Incorrect password.';
		}
	}
}

if(isset($_GET['logout'])){
	echo 'Logout invoked.';
	unset($_COOKIE['uid']);
	setcookie("uid","",time()-3600,"/",".phantastyc.tk");
	header("Location: http://phantastyc.tk/feed");
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
    	<h2>Hiya User Number <?php echo $_COOKIE['uid']?></h2>
        <form action="?logout" method="post">
        	<input type="submit" value="logout">
        </form>
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