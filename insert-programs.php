<?php
require_once 'dbconn.php';
error_reporting(E_ALL & ~E_NOTICE);
?>

<!DOCTYPE html>
<html>
<head>
<title>Insert new Program(s) - Spooky2 Diary</title>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="UTF-8">
<!-- Mobile friendly-->
<meta name="viewport" content="width=320, initial-scale=1">
<!-- Include CSS File Here-->
<link href="style3.css" rel="stylesheet">
</head>

<body>
	<div class="container">
	<div class="left">		 
		<h2>- Insert new Program(s) -</h2>			   
		<br>
		<!-- Create new entry into Hrana list from DB -->
		<a href="./">Return home</a> 
		
		<!-- old select menu below
		<form method = 'post'>		
		<!----- Select Option Fields Starts Here ----->
		<!-- old select menu above -->		

	<form method = 'post' accept-charset = 'utf-8'>	

		<br>
		<h3>Add Program(s):<br>   
		<input type = 'programlist' class = 'programlist' maxlength = '55'  placeholder = 'Add Program' name = 'programlist[]' required>
		</h3>		
		<input type = 'submit' name = 'submit' value = 'Submit'>
		
<?php 

	//MySQL Database Connect 
	include 'dbconn.php';
	
	// Error reporting
	error_reporting(E_ALL);
	error_reporting(-1);
	
	// Check if Program field is submitted successfully 
	if(isset($_POST["submit"])) 
	{
		// Check if any option is selected 
		if(isset($_POST["programlist"])) 
		{ 
			// Retrieving each selected option 
			foreach ($_POST['programlist'] as $programlist) 
				print "<br/><br/>You selected <b/>$programlist</b/>"; 
		}
	else
		print "<br/>Select an option first !!"; 
	}
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("<br/>Connection failed: " . $conn->connect_error);
	}
	/* change character set to utf8 */
	if (!$conn->set_charset("utf8")) {
		printf("<br/>Error loading character set utf8: %s\n", $conn->error);
	} else {
		printf("<br/>Current character set: %s\n", $conn->character_set_name());
	}

	// Now post entries also into DB
		if(isset($_POST["submit"])) {
		{ 
			// Retrieving each selected option 
			foreach ($_POST['programlist'] as $programlist) { 
				$sql = "INSERT INTO `$dbname`.`$programs` (`programlist`) VALUES ('$programlist')";
			}
		}
		// Check the results and print the appropriate message.
		if ($conn->query($sql) === TRUE) {
			// echo "New record created successfully";
			print "<br/><br/>Record successfully inserted!<br/>";
		} else {
			//echo "Error: " . $sql . "<br>Record not inserted!" . $conn->error;
			print "Error: " . $sql . "<br/>Record not inserted!<br/>" . $conn->error;
		}
	}
	
	$conn->close();	
?>
		</form>
	</div>
	
	<div class="right">
	<?php
	include 'select-program.php';
	?>
	</div>
	
	</body> 
</html>
