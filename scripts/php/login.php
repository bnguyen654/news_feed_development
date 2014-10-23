<?php

require "db.php"; //not included in git for security

$users = "users";

function check_login($user, $pass){
	global $users;
	$db = connect_db("news");
	$result = mysqli_query($db,"SELECT * FROM $users WHERE username='$user' OR email='$user'");
	$data = mysqli_fetch_assoc($result);
	mysqli_close($db);
	if ($data['password'] == $pass) return $data['uid'];
	else return 0;
}

function create_user($user, $pass, $email, $fname="", $lname="", $title=""){
	$db = connect_db("news");
	$last_uid = mysqli_query($db,"SELECT uid FROM $users
	ORDER BY uid DESC LIMIT 1");
	$last_uid++;
	
	$mysqli_query($db, "INSERT INTO $users (uid,username,password,email,first_name,last_name,title)
	VALUES ($last_uid,$user,$pass,$email,$fname,$lname,$title)");
	mysqli_close($db);
}

?>