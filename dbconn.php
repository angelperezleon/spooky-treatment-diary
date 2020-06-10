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
	
// Create connection 
	//$mysqli = new mysqli("localhost", $username, $password, $database);
	//$conn = mysqli_connect( $servername, $username, $password, $dbname );
	// $sql = mysqli_connect($servername, $username, $password, $dbname)or die("No Connection");
	// dont enable BELOW as it clased with main $sql stament in index.php file
	//$sql = new mysqli($servername, $username, $password, $dbname)or die("No Connection");
