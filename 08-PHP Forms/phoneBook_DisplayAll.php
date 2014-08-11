<?php include 'phoneBook_header.php'; ?>
			<main id="second">
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
					<label for="sort">Sort By</label>
					<select name="sort">
					  <option value="city">City</option>
					  <option value="date1">Date Added ASC</option>
					  <option value="date2">Date Added DESC</option>
					  <option value="cityAndDate">City And Date</option>
					</select>
					<input type="submit" value="Display" name="submit" />
				</form>
				<?php
					define('DISPLAY_PATH', '/uploads/');
					$db = new mysqli('localhost', 'root', '', 'phonebook');

					if($db->connect_errno > 0){
					    die('Unable to connect to database [' . $db->connect_error . ']');
					}

					if (isset($_POST['submit'])) {
						if ($_POST['sort'] == 'city') {
						$sql = <<<SQL
    						SELECT *
    						FROM book
    						ORDER BY city
SQL;
						} else if($_POST['sort'] == 'date1') {
							$sql = <<<SQL
    						SELECT *
    						FROM book
    						ORDER BY date
SQL;
						}  else if($_POST['sort'] == 'cityAndDate') {
							$sql = <<<SQL
    						SELECT *
    						FROM book
    						ORDER BY city, date
SQL;
						}  else {
							$sql = <<<SQL
    						SELECT *
    						FROM book
    						ORDER BY date DESC
SQL;
						}
					if(!$result = $db->query($sql)){
					    die('There was an error running the query [' . $db->error . ']');
					}

					while($row = $result->fetch_assoc()){
						echo "<section>";
				    	if($row['size'] > 0) {
				    		echo '<div><img src="' . DISPLAY_PATH . $row['name']. '"/></div>';
						} else {
							echo '<div><img src="' . DISPLAY_PATH . "default.png" . '"/></div>';
						}
						echo "<div><table><tr><td>First Name</td><td>Last Name</td><td>City</td><td>Phone Number</td><td>Email</td><td>Gender</td><td>Additional Info</td></tr>";
						echo "<tr>";
						echo "<td>" . $row['firstname'] . "</td>";
						echo "<td>" . $row['lastname'] . "</td>";
						echo "<td>" . $row['city'] . "</td>";
						echo "<td>" . $row['phone'] . "</td>";
						echo "<td>" . $row['email'] . "</td>";
						if ($row['gender'] == "no") {
							echo "<td>" . "No Info" . "</td>";
						} else {
							echo "<td>" . $row['gender'] . "</td>";
						}
						echo "<td>" . $row['notes'] . "</td>";
						echo "</tr></table></div></section>";
					}
				}
				?>
			</main>
		</div>
	</body>
</html>


