<!--  START - Display selected presetslist BLOCK

	<form method="post" accept-charset="utf-8" size="50">
	Read  -->
	<select name='presetslist[]' size="1" id="formFoods" required>
<?php

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
