<!DOCTYPE html>

<!-- Info -->
<!-- 
Author: Angel Perez-Leon
Description: To enable Spooky2 Treatments to be recorded from a front panel form and post these into a database.
Git page: https://github.com/angelperezleon/spooky-treatment-diary
Credits: In the code below
 -->
<?php
require_once 'dbconn.inc.php';
error_reporting(-1);
ini_set('display_errors', '1'); // you can set this to 0 when it goes to production. PHP errors will still be logged, but not show up in the browser.
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
        <!-- an input type for datetime can be found here <https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input/datetime-local> 
             but is not yet widely supported. -->
		<input type="date" value="<?php echo date('Y-m-d'); ?>" name="dateFrom" required>
		</h4>
		<h4>Recipient:
		<input type = 'text' class = 'text' maxlength = '21'  placeholder = 'Jass' name="recipient" required>
		</h4>
		
		<h4>Select preset:
		<!-- START Render entire Spooky2 Preset list from DB -->
		<?php
		require_once 'select-preset.inc.php';
		?>
		<!-- END Render entire Spooky2 Preset list from DB -->
		</h4>
		<!-- Create new entry into Spooky2 Program list from DB -->
		<a href="insert-preset.php">Create new Preset(s)</a> 
		 
		<h4>Select programs:
		<!-- START Render entire Spooky2 Program list from DB -->
		<?php
		require_once 'select-program.inc.php';
		?>
		<!-- END Render entire Spooky2 Program list from DB -->
		</h4>
		<!-- Create new entry into Spooky2 Program list from DB -->
		<a href="insert-programs.php">Create new Program(s)</a> 
		<br><br>
		
		<h4>Settings:
		<!-- 
		<input type = 'text' pattern="^[a-zA-Z0-9\.$%&#]*$" class = 'text' maxlength = '30' placeholder = '0.02% feathering' name = 'settings' required>
		 -->
		<input type = 'text' pattern="[^->]+" class = 'text' maxlength = '30' placeholder = '0.02% feathering' name = 'settings' required>
		</h4>
		
		<h4>Equipment used:
		<label><input type="checkbox" value="GeneratorX" name="methods[]" checked>GeneratorX</label>
		<label><input type="checkbox" value="XM-Generator" name="methods[]" checked>XM-Generator</label>
		<label><input type="checkbox" value="Remote v2" name="methods[]">Remote v2</label>
		<label><input type="checkbox" value="Spooky Boost" name="methods[]">Spooky Boost</label>
		<label><input type="checkbox" value="Sample Digitizer" name="methods[]">Sample Digitizer</label>
		<label><input type="checkbox" value="Spooky Central" name="methods[]">Spooky Central</label>
		<label><input type="checkbox" value="Plasma straight tube" name="methods[]">Plasma Straight tube</label>
		<label><input type="checkbox" value="Plasma phonatron tube" name="methods[]">Plasma Phonatron tube</label>
		<label><input type="checkbox" value="Coil" name="methods[]">Coil</label>
		<label><input type="checkbox" value="TEN's pads" name="methods[]">TEN's pads</label>
		<label><input type="checkbox" value="Ultra Sound" name="methods[]">Ultra Sound</label>
		</h4>
		<!-- Notes  -->
		<h4>Notes:
		<!-- START
		<input type = 'notes' class = 'text' maxlength = '100' placeholder = 'Treatment notes' name = 'notes[]'>
		END  -->
		<textarea class = 'textarea' cols="3" rows="3" placeholder = 'Treatment notes' name="notes"></textarea>
		<!-- Textarea (Multiline) -->
		</h4>
		
		<!-- Submit to db -->
		<input type = 'submit' name = 'submit' value = Submit>

<?php
	// Error reporting
    // error_reporting(E_ALL);
	//error_reporting(-1);
	// error_reporting(-1); ini_set('display_errors', '1');
	
	// header("Content-Type:text/html; charset=utf-8");
	//Calculate Date & time
	// https://www.w3schools.com/php7/php7_date_time.asp
	//$date = date('d-m-Y', strtotime($_POST['dateFrom']));	
	//$date = date('d-m-Y').date("H:i:s", strtotime("+2 hours"));
	//$time = date("h:ia");
	$date = date('d-m-Y');
        $time = date("H:i:s", strtotime("+2 hours"));
	//$datetime = $date;	
	$datetime = $date  . " " . $time;
	
	// Check if form is submitted.
	// if it is, check all the inputs, and if they are all ok, store the data in the database
	if (isset($_POST["submit"])) {
		
		$submit_errors = false; // by default the form has not been submitted.
		
		// Check if date is submitted successfully 
		if (isset($_POST["dateFrom"])) {
			$dateFrom = $_POST["dateFrom"];
			print "<br>&nbsp; a date of <b>$dateFrom</b> &#124;";
		} else {
			$submit_errors = true;
			print "<br>&nbsp; <font color=red>Select a date first !!</font> &#124;";
		}
		
		// Check if recipient is submitted successfully
		if (isset($_POST["recipient"])) {
			$recipient = $_POST["recipient"];
			print "&nbsp; Treatment for <b>$recipient</b>";
		} else {
			$submit_errors = true;
			print "&nbsp; <font color=red>Who is the treatment for ?</font>";
		}
	
		// Check if presetslist is submitted successfully
		if (isset($_POST["presetslist"])) {
			$presetslist = $_POST["presetslist"];
			print "<br>&nbsp; Preset(s) is: <b>$presetslist</b> &#124;"; 
		} else{
			$submit_errors = true;
			print "<br>&nbsp; <font color=red>Select a Preset(s) from the list first!!</font> &#124;";
		}
		
		// Check if programlist is submitted successfully
		if (isset($_POST["programlist"])) {
			$programlist = $_POST["programlist"];
			print "&nbsp; Program(s) is: <b>$programlist</b>";
		} else{
			$submit_errors = true;
			print "&nbsp; <font color=red>Select a Program(s) from the list first!!</font>";
		}
		
		// Check if settings is submitted successfully
		if (isset($_POST["settings"])) {
			$settings = $_POST["settings"];
			print "<br>&nbsp; Settings of: <b>$settings</b>";
		} else {
			$submit_errors = true;
			print "<br>&nbsp; <font color=red>Set a settings first !!</font>";
		}
		
		// Check if method is submitted successfully
		if (isset($_POST["methods"])) {
			$methods = join(', ', $_POST['methods']);
			print "<br>&nbsp; Equipment used: <b>$methods</b>";
		} else {
			$submit_errors = true;
			print "<br>&nbsp; <font color=red>Select equipment used !!</font>";
		}
		
		// Check if notes field is submitted successfully
		if (isset($_POST["notes"])) {
			$notes = $_POST["notes"];
			print "<br>&nbsp; Treatments notes: <b>".nl2br($notes)."</b>";
		} else {
			$submit_errors = true;
			print "<br>&nbsp; <font color=red>Add a note !!</font>";
		}
		
		// the form was submitted, if there are no errors store the entries into the database
		if (! $submit_errors) {
			// make sure _each_ field that comes from the browser is properly escaped before making it part of the SQL query
			$date      = $conn->real_escape_string($date);
			$recipient = $conn->real_escape_string($recipient);
			$preset    = $conn->real_escape_string($preset);
			$programs  = $conn->real_escape_string($programs);
			$settings  = $conn->real_escape_string($settings);
			$methods   = $conn->real_escape_string($methods);
			$notes     = $conn->real_escape_string($notes);
			$sql = "INSERT INTO `$dbname`.`$table` (`date`,`recipient`,`preset`,`programs`,`settings`,`method`,`notes`) VALUES ('$datetime', '$recipient', '$presetslist', '$programlist', '$settings', '$methods', '$notes')";
			// Check the results and print the appropriate message.
			if ($conn->query($sql) === TRUE) {
				// echo "New record created successfully";
				print "<br><br>Record successfully inserted!<br>";
			} else {
				//echo "Error: " . $sql . "<br>Record not inserted!" . $conn->error;
				print "Error: " . $sql . "<br>Record not inserted!<br>" . $conn->error;
			}
		} else {
			print "Error: some fields were not filled in correctly, please correct these and try again.";
		}
	}
	
?>
	</form>
	</div>
	
	<div class="bottom">
	<?php
	require_once 'query-show.inc.php';
	?>
	</div>
	</div>

	</body>
</html>
