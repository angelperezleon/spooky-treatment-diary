<?php
	
	error_reporting(E_ALL & ~E_NOTICE);
	// Source: https://www.w3schools.com/php/php_mysql_select.asp

  if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $no_of_records_per_page = 5;
        $offset = ($pageno-1) * $no_of_records_per_page;
		//$conn->set_charset("utf8mb4");

        $total_pages_sql = "SELECT COUNT(*) FROM diary";
        $result = mysqli_query($conn,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);

        $sql = "SELECT * FROM `diary` ORDER BY `id` DESC LIMIT $offset, $no_of_records_per_page";
	
	$res_data = $conn->query($sql);
	
	if ($res_data->num_rows > 0) {
		echo "<table width='100%'><tr><th>#</th><th>Date</th><th>Recipient</th><th>Preset(s)</th><th>Program(s)</th><th>Settings</th><th>Method</th><th>Notes</th></tr>";
		// output data of each row
		while($row = $res_data->fetch_assoc()) {
			echo "<tr align='center'><td>".$row["id"]."</td><td>".$row["date"]."</td><td>".$row["recipient"]."</td><td>".$row["preset"]."</td><td>".$row["programs"]."</td><td>".$row["settings"]."</td><td>".$row["method"]."</td><td>".$row["notes"]."</td></tr>";
		}
		echo "</table>";
	} else {
		echo "0 results";
	}	
	
	$conn->close();
?>
<!-- 
    <ul class="pagination">
		<li><a href="?pageno=<?php echo $total_pages; ?>"><<</a></li>
		
        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>"><</a>
        </li>        
		
        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">></a>
        </li>
		
		<li><a href="?pageno=1">>></a></li>
    </ul>
 -->
 
 <table style="width:100%">
   <tr>
     <td width="10">
    <ul class="pagination">
		<li><a href="?pageno=<?php echo $total_pages; ?>">&lt;&lt;</a></li>
		 </ul>
		</td>
            <td width="10">
			<ul class="pagination">
        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">&lt;</a>
        </li>
		</ul>		
		</td>
		<td width="450">
        </td>
            <td width="10">
			<ul class="pagination">
        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">&gt;</a>
        </li>
		 </ul>
		</td>
            <td width="10">
			<ul class="pagination">
		<li><a href="?pageno=1">&gt;&gt;</a></li>
    </ul>
	   </td>
    </tr>
</table>

