<?php
	session_start();
	$dbaddress = "127.0.0.1";
	$dbuser = "root";
	$dbpass = "";
	$db = "users_noteread";
	
	$sqli = mysqli_connect($dbaddress, $dbuser, $dbpass, $db);
	if (mysqli_connect_errno()) {
		printf("Connection Failed: %s\n", mysqli_connect_error());
		exit();
	}
	
	$loggedin = false;
	if(isset($_SESSION['id'])&&!empty($_SESSION['id'])){
		$loggedin = true;
		$userid = $_SESSION['id'];
		$user = mysqli_fetch_array(mysqli_query($sqli, "SELECT username FROM users WHERE id='".$userid."'"))[0];
	}
	
?>