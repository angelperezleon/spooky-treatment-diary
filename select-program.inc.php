<!--  START - Display selected programlist BLOCK

	<form method="post" accept-charset="utf-8" size="50">
	Read  -->
	<select name='programlist[]' size="1" id="formFoods" required>
<?php
	//header("Content-Type:text/html; charset=utf-8");
	 //header("Content-Type: text/html;charset=UTF-8");
	// Start - Display Spooky2 Program list from DB
		$sqlrec = mysqli_query($conn, "SELECT programlist FROM programs");	
			while ($row = $sqlrec->fetch_assoc()){
		echo "<option value=\"$row[programlist]\">" . $row['programlist'] . "</option>";
	}
	// End - Display Spooky2 Program list from DB

?>
	</select>

	<!-- Comment out submit button
	<input type="submit" value="Submit">


<?php
//header("Content-Type:text/html; charset=utf-8");
	
	// Start - Display selected programlist
	if (isset($_POST["programlist"]))
	{
		$programout = $_POST['programlist'];
			echo "$programout";			
			//header('Content-Type: text/html; charset=utf-8');
					
	// Change character set to utf8
	//mysqli_set_charset($con,"utf8");
	
			//echo "$programout";
			//echo mb_convert_encoding("$programout", 'UTF-8', 'UTF-16BE');
	}
	// Start - Display selected programlist
?>
END - Display selected programlist BLOCK -->
