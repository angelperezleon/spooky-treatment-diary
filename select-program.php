<!--  START - Display selected programlist BLOCK

	<form method="post" accept-charset="utf-8" size="50">
	Read  -->
	<select name='programlist[]' size="1" id="formFoods" required>
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
