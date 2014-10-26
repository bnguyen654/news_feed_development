<?php
	require_once "db.php";
	
	function verify($sid){
		$ip = $_SERVER['REMOTE_ADDR'];
		$agent = $_SERVER['HTTP_USER_AGENT'];
		$uid = $_COOKIE['uid'];
		
		$db = connect_db("news");
		
		$q = "SELECT *
		FROM $sessions
		WHERE sid='$sid'
		AND uid='$uid'
		AND agent='$agent'
		AND ip='$ip'";
		
		$result = $db->query($q);
		
		$db->close();
		
		return $result->num_rows == 1;
	}
	
	function create($sid){
		$ip = $_SERVER['REMOTE_ADDR'];
		$agent = $_SERVER['HTTP_USER_AGENT'];
		$uid = $_COOKIE['uid'];
		
		$db = connect_db("news");
		
		$q = "INSERT INTO $sessions (sid, uid, agent, ip)
		VALUES ($sid,$uid,$agent,$ip)";
		
		$db->query();
		$db->close();
	}
?>