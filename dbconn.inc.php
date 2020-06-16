<?php 

// Now insert value into db
	$servername = "localhost"; 
	$username = "yourdbuser"; 
	$password = "your-pass"; 
	$dbname = "yourdbname";	
	$table = "diary";
	$preset = "preset";
	$programs = "programs";
	//$optionstable = "options";
	//$date = date('m/d/Y h:i:s', time());
	$date = date("d-m-Y H:i:s");	
	//$date = date('d-m-Y');
	$plus2hrs = date("d-m-Y H:i", strtotime("+2 hours"));
	
	$conn = new mysqli($servername, $username, $password, $dbname);
	$conn->set_charset("utf8mb4");
	
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
