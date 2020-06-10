<!-- Info -->
<!-- 
Author: Angel Perez-Leon
Description: To enable Spooky2 Treatments to be recorded from a front panel form and post these into a database.
Git page: https://github.com/angelperezleon/spooky-treatment-diary
Credits: In the code below
 -->
<?php
require_once 'dbconn.php';
error_reporting(E_ALL & ~E_NOTICE);
error_reporting(-1); ini_set('display_errors', '1');
?>

<html>
<head>
<title>Spooky2 Treatment Diary</title>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=320, initial-scale=1">
<meta charset="UTF-8">
<!-- History -->
<!-- 27.5.2020 - Spooky2 Treatment Diary started!  -->

<!-- Include CSS File Here-->
<link href="style.css" rel="stylesheet">
</head>

<body>

<div class="container">
<div class="top">	
	 
		<h2>- Spooky2 Treatment Diary -</h2>		
		
		<form method = 'post' accept-charset = 'utf-8'>
		
		<!-- Date example: 11-04-2019 17:20:22 -->
		<h4>Date:
		<input type="date" value="<?php echo date('d-m-Y H:i:s'); ?>" /  name="dateFrom" required>
		</h4>
		<h4>Recipient:
		<input type = 'text' class = 'text' maxlength = '21'  placeholder = 'Jass' name="recipient[]" required>
		</h4>
		
		<h4>Select preset:
		<!-- START Render entire Spooky2 Preset list from DB -->
		<?php
		include 'dbconn.php';
		include 'select-preset.php';
		?>
		<!-- END Render entire Spooky2 Preset list from DB -->
		</h4>
		<!-- Create new entry into Spooky2 Program list from DB -->
		<a href="insert-preset.php">Create new Preset(s)</a> 
		 
		<h4>Select programs:
		<!-- START Render entire Spooky2 Program list from DB -->
		<?php
		include 'dbconn.php';
		include 'select-program.php';
		?>
		<!-- END Render entire Spooky2 Program list from DB -->
		</h4>
		<!-- Create new entry into Spooky2 Program list from DB -->
		<a href="insert-programs.php">Create new Program(s)</a> 
		<br></br>
		
		<h4>Settings:
		<!-- 
		<input type = 'text' pattern="^[a-zA-Z0-9\.$%&#]*$" class = 'text' maxlength = '30' placeholder = '0.02% feathering' name = 'settings[]' required>
		 -->
		<input type = 'text' pattern="[^->]+" class = 'text' maxlength = '30' placeholder = '0.02% feathering' name = 'settings[]'required>
		</h4>
		
		<h4>Equipment used:
        <input type="checkbox" value="GeneratorX" name="method[]" checked />GeneratorX</input>
        <input type="checkbox" value="Spooky Central" name="method[]">Spooky Central</input>
        <input type="checkbox" value="Plasma straight tube" name="method[]">Plasma Straight tube</input>
		<input type="checkbox" value="Plasma phonatron tube" name="method[]">Plasma Phonatron tube</input>
        <input type="checkbox" value="Coil" name="method[]">Coil</input>
        <input type="checkbox" value="TEN's pads" name="method[]">TEN's pads</input>
        <input type="checkbox" value="Ultra Sound" name="method[]">Ultra Sound</input>
        </h4>
		
		<!-- dont work
		<select multiple="multiple" style="height: 24pt" size="10" autocomplete="off" name="equipment[]" required>
		
		<select multiple="multiple" size="1" autocomplete="off" name="equipment[]" required>
			<option value="#">GeneratorX</option>
			<option value="#">Spooky Central</option>
			<option value="#">Plasma straight tub</option>
			<option value="#">Plasma phonatron tube</option>
			<option value="#">Coil</option>
			<option value="#">TEN's pads</option>
			<option value="#">Ultra Sound</option>
		</select>
         -->
		 
		<!-- Notes  -->
		<h4>Notes:
		<!-- START
		<input type = 'notes' class = 'text' maxlength = '100' placeholder = 'Treatment notes' name = 'notes[]'>
		END  -->
		<textarea class = 'textarea' cols="3" rows="3" placeholder = 'Treatment notes' name="notes[]"></textarea> 
		<!-- Textarea (Multiline) -->
		</h4>
		
		<!-- Submit to db -->		
		<input type = 'submit' name = 'submit' value = Submit>

<?php
	// Error reporting
	error_reporting(E_ALL);
	//error_reporting(-1);
	error_reporting(-1); ini_set('display_errors', '1');
	
	// header("Content-Type:text/html; charset=utf-8");
	//Calculate Date & time
	// https://www.w3schools.com/php7/php7_date_time.asp
	//$date = date('d-m-Y', strtotime($_POST['dateFrom']));	
	//$date = date('d-m-Y').date("H:i:s", strtotime("+2 hours"));
	//$time = date("h:ia");
	$date = date('d-m-Y');
	$time = date("H:i:s", strtotime("+2 hours"));
	$datetime = $date  . " " . $time;
	
	//MySQL Database Connect 
	include 'dbconn.php';
	

	
		// Check if date form is submitted successfully 
	if(isset($_POST["submit"])) 
	{ 
		// Check if any option is selected 
		if(isset($_POST["datetime"])) 
		// https://www.zen-cart.com/showthread.php?204417-PHP-Warning-Invalid-argument-supplied-for-foreach()-in-update_product-php-on-line-2
		//if(isset($_POST["dateFrom"])) && is_array($_POST['dateFrom'))
		{ 
			// Retrieving each selected option 
			//foreach ($_POST['dateFrom'] as $datetime)
			foreach ($_POST['datetime'] as $datetime)
				print "<br/>&nbsp; a date of <b/>$datetime</b/> &#124;"; 
		} 
	else
		print "<br/>&nbsp; <font color=red>Select a date first !!</font> &#124;"; 
	}
	
		// Check if recipient form is submitted successfully 
	if(isset($_POST["submit"])) 
	{ 
		// Check if any option is selected 
		if(isset($_POST["recipient"]))
		{ 
			// Retrieving each selected option 
			foreach ($_POST['recipient'] as $recipient) 
				print "&nbsp; Treatment for <b/>$recipient</b/>"; 
		} 
	else
		print "&nbsp; <font color=red>Who is the treatment for ?</font>"; 
	}
	
	// Check if Preset list is submitted successfully 
	if(isset($_POST["submit"])) 
	{ 
		// Check if any option is selected 
		if(isset($_POST["presetslist"])) 
		{ 
			// Retrieving each selected option 
			foreach ($_POST['presetslist'] as $presetslist) 
				print "<br/>&nbsp; Preset(s) is: <b/>$presetslist</b/> &#124;"; 
		} 
	else
		print "<br/>&nbsp; <font color=red>Select a Preset(s) from the list first!!</font> &#124;"; 
	}
	
	// Check if Program list is submitted successfully 
	if(isset($_POST["submit"])) 
	{ 
		// Check if any option is selected 
		if(isset($_POST["programlist"])) 
		{ 
			// Retrieving each selected option 
			foreach ($_POST['programlist'] as $programlist) 
				print "&nbsp; Program(s) is: <b/>$programlist</b/>"; 
		} 
	else
		print "&nbsp; <font color=red>Select a Program(s) from the list first!!</font>"; 
	}
	
	// Check if settings field is submitted successfully 
	if(isset($_POST["submit"])) 
	{ 
		// Check if any option is selected 
		if(isset($_POST["settings"])) 
		{ 
			// Retrieving each selected option 
			foreach ($_POST['settings'] as $settings) 
				print "<br/>&nbsp; Settings of: <b/>$settings</b/>"; 
		} 
	else
		print "<br/>&nbsp; <font color=red>Set a settings first !!</font>"; 
	}
	
		
	// Check if method field is submitted successfully 
	if(isset($_POST["submit"])) 
	{ 
		// Check if any option is selected 
		if(isset($_POST["method"])) 
		{ 
			// Retrieving each selected option 
			foreach ($_POST['method'] as $method)
			(var_export($_POST['method'])
				print "<br/>&nbsp; Method used: <b/>$method</b/>"; 
		} 
	else
		print "<br/>&nbsp; <font color=red>Select Method used !!</font>"; 
	}
		
	// Check if Notes field is submitted successfully 
	if(isset($_POST["submit"])) 
	{ 
		// Check if any option is selected 
		if(isset($_POST["notes"])) 
		{ 
			// Retrieving each selected option 
			foreach ($_POST['notes'] as $notes) 
				print "<br/>&nbsp; Treatments notes: <b/>$notes</b/>"; 
		} 
	else
		print "<br/>&nbsp; <font color=red>Add a note !!</font>"; 
	}
	
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Fix by Marco Gasi special chars been displayed
	// https://www.experts-exchange.com/questions/28967328/mysql-question-mysql-query-SET-NAMES-'utf8'.html
	$conn->set_charset("utf8mb4");
	
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
}

	// Now post entries also into DB
		if(isset($_POST["submit"])) {
		{ 
			// Retrieving each selected option 
			foreach ($_POST['programlist'] as $programlist) {
				// fix by Nomiko #web irc.freenode.net
				// submit multiple checkbox selections
				$method = join(', ', $_POST['method']);
				$sql = "INSERT INTO `$dbname`.`$table` (`date`,`recipient`,`preset`,`programs`,`settings`,`method`,`notes`) VALUES ('$datetime', '$recipient', '$presetslist', '$programlist', '$settings', '$method', '$notes')";
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
	
	<div class="bottom">
	<?php
	include 'query-show.php';
	?>
	</div>

	</body> 
</html>
