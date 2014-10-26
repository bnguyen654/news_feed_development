<?php

require_once "db.php"; //not included in git for security
require_once "session.php";

if($_GET['check']){
	
}

function check_login($user, $pass){
	global $users;
	$db = connect_db("news");
	$result = $db->query("SELECT * FROM $users WHERE username='$user' OR email='$user'");
	$data = $result->fetch_assoc();
	mysqli_close($db);
	if ($data['password'] == $pass) return $data['uid'];
	else return 0;
}

function create_user($user, $pass, $email, $fname="", $lname="", $title=""){
	$db = connect_db("news");
	
	$mysqli_query($db, "INSERT INTO $users (uid,username,password,email,first_name,last_name,title)
	VALUES (0,$user,$pass,$email,$fname,$lname,$title)");
	mysqli_close($db);
}

?>