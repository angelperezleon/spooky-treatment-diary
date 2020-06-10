<?php
require_once 'dbconn.php';
error_reporting(E_ALL & ~E_NOTICE);
?>

<!DOCTYPE html>
<!--
	Spooky2 Treatment Diary
	https://www.angelperezleon.com/spooky2
-->
<html>
<head>
	<meta charset="UTF-8">
	<title>Spooky2 Treatment Diary - Spooky2 Preset lists</title>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="UTF-8">
		<!-- -->
	<link href="style3.css" rel="stylesheet">		
	</head>
	<body>
	
<!--  START - Display selected presetslist BLOCK

	<form method="post" accept-charset="utf-8" size="50">
	<!-- Read  -->
	<select name='presetslist[]' size="1" id="formFoods" required>
<?php
	//header("Content-Type:text/html; charset=utf-8");
	 //header("Content-Type: text/html;charset=UTF-8");
	// Start - Make connection to DB server	
	require_once 'dbconn.php';	
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Fix by Marco Gasi special chars been displayed
	// https://www.experts-exchange.com/questions/28967328/mysql-question-mysql-query-SET-NAMES-'utf8'.html
	$conn->set_charset("utf8mb4");
	
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	// End - Make connection to DB server

	// Start - Display Spooky2 Program list from DB
		$sqlrec = mysqli_query($conn, "SELECT presetslist FROM preset");	
			while ($row = $sqlrec->fetch_assoc()){
		echo "<option value=\"$row[presetslist]\">" . $row['presetslist'] . "</option>";
	}
	// End - Display Spooky2 Program list from DB

?>
	</select>

	<!-- Comment out submit button
	<input type="submit" value="Submit">


<?php
//header("Content-Type:text/html; charset=utf-8");
	
	// Start - Display selected presetslist
	if (isset($_POST["presetslist"]))
	{
		$presetsout = $_POST['presetslist'];
			echo "$presetsout";			
			//header('Content-Type: text/html; charset=utf-8');
					
	// Change character set to utf8
	//mysqli_set_charset($con,"utf8");
	
			//echo "$presetsout";
			//echo mb_convert_encoding("$presetsout", 'UTF-8', 'UTF-16BE');
	}
	// Start - Display selected presetslist
?>
END - Display selected presetslist BLOCK -->

</body>
</html>
