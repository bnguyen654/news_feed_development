<?php

$db_list = array(
	"news" => array(
		"user" => "stem",
		"password" => "stem2014",
		"db" => "news_feed",
	)
);

function connect_db($dbid){
	global $db_list;
	$user; $password; $host; $db;
	if(array_key_exists($dbid,$db_list)){
		$user = $db_list[$dbid]["user"];
		$password = $db_list[$dbid]["password"];
		$db = $db_list[$dbid]["db"];
		$host = array_key_exists('host',$db_list[$dbid]) ? $db_list[$dbid]["host"] : "localhost";
		echo 'Connected.';
	}
	
	$conn = mysqli_connect($host,$user,$password,$db);
	if (!$conn) {
		echo '<div class="alert alert-danger">';
		echo 'Error connecting to database:' . mysqli_connect_error();
		echo '</div>';
	}
	
	return $conn;
}


?>