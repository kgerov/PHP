<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Tables As Database</title>
		<style>
			table {
				border: 1px solid black;
				border-collapse: collapse;
			}
			tr, td {
				border: 1px solid black;
				padding: 10px;
			}
			table:nth-child(2){
				margin-top: 25px;
			}
		</style>
	</head>
	<body>
		<?php 
			$dblink = mysql_connect("localhost", "root", "");

			if(!(mysql_select_db("01.oophwrecreation", $dblink))){
			    echo "Can't access DB";
			}
			
			$query = "select * from users";
			$result = mysql_query($query, $dblink);
			if (!$result) {
			    echo 'Error: ' . mysql_error() . "\n";

			    echo "Query: " . $query;
			}

			echo "<table>";
			echo "<tr>";
			echo "<td>PRIMARY KEY</td>";
			echo "<td>First Name</td>";
			echo "<td>Last Name</td>";
			echo "<td>Age</td>";
			echo "<td>Profile Pic</td>";
			echo "<td>Sex</td>";
			echo "<td>Password</td>";
			echo "<td>Secret Question</td>";
			echo "<td>Scret Answer</td>";
			echo "<td>Email</td>";
			echo "<td>Cars</td>";
			echo "</tr>";
			while ($currentRow = mysql_fetch_row($result)) {
				echo "<tr>";
				echo "<td>" . $currentRow[0] . "</td>";
			    echo "<td>" . $currentRow[1] . "</td>";
			    echo "<td>" . $currentRow[2] . "</td>";
			    echo "<td>" . $currentRow[3] . "</td>";
			    echo "<td>" . $currentRow[4] . "</td>";
			    echo "<td>" . $currentRow[5] . "</td>";
			    echo "<td>" . $currentRow[6] . "</td>";
			    echo "<td>" . $currentRow[7] . "</td>";
			    echo "<td>" . $currentRow[8] . "</td>";
			    echo "<td>" . $currentRow[9] . "</td>";
			    echo "<td>" . $currentRow[10] . "</td>";
			    echo "</tr>";
			}
			echo "</table>";

			$query2 = "select * from workman";
			$result2 = mysql_query($query2, $dblink);
			if (!$result2) {
			    echo 'Error: ' . mysql_error() . "\n";
			    echo "Query: " . $query2;
			}
			echo "<table>";
			echo "<tr>";
			echo "<td>PRIMARY KEY</td>";
			echo "<td>JOBS</td>";
			echo "<td>PAYMENT</td>";
			echo "<td>FOREIGN KEY</td>";
			echo "</tr>";
			while ($currentRow = mysql_fetch_row($result2)) {
			   echo "<tr>";
				echo "<td>" . $currentRow[0] . "</td>";
			    echo "<td>" . $currentRow[1] . "</td>";
			    echo "<td>" . $currentRow[2] . "</td>";
			    echo "<td>" . $currentRow[3] . "</td>";
			    echo "<tr>";
			}
			echo "</table>";
		?>
	</body>
</html>