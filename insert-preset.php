<?php
require_once 'dbconn.inc.php';
error_reporting(E_ALL & ~E_NOTICE);
?>
<!DOCTYPE html>
<html>
<head>
<title>Insert new Preset(s) - Spooky2 Diary</title>
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
	 
		<h2>-   Insert new Preset(s)   -</h2>			   
		<br>
		<!-- Create new entry into Hrana list from DB -->
		<a href="./">Return home</a> 
		
		<!-- old select menu below
		
		<form method = 'post'>
		 Select Option Fields Starts Here
		
		old select menu above -->
		
	<form method = 'post' accept-charset = 'utf-8'>
		<br>
		<h3>Add Preset(s):<br>   
		<input type = 'presetslist' class = 'presetslist' maxlength = '100'  placeholder = 'Add Preset' name = 'presetslist[]' required>
		</h3>		
		<input type = 'submit' name = 'submit' value = 'Submit'>
		
<?php 

	// Check if Preset(s) form is submitted successfully 
	if(isset($_POST["submit"])) 
	{ 
		// Check if any option is selected 
		if(isset($_POST["presetslist"])) 
		{ 
			// Retrieving each selected option 
			foreach ($_POST['presetslist'] as $presetslist) 
				print "<br/><br/>You selected <b/>$presetslist</b/>"; 
		} 
	else
		print "<br/>Select an option first !!"; 
	}
		
	// Now post entries also into DB
		if(isset($_POST["submit"])) {
		{ 
			// Retrieving each selected option 
			foreach ($_POST['presetslist'] as $presetslist) { 
				$sql = "INSERT INTO `$dbname`.`$preset` (`presetslist`) VALUES ('$presetslist')";
			}
		}
		// Check the results and print the appropriate message.
		if ($conn->query($sql) === TRUE) {
			print "<br/><br/>Record successfully inserted!<br/>";
		} else {			
			print "Error: " . $sql . "<br/>Record not inserted!<br/>" . $conn->error;
		}
	}
	
?>
		</form>
	</div>
	
	<div class="right">
	<?php
	include 'select-preset.inc.php';
	?>
	</div>
	</div>
	
	</body> 
</html>
