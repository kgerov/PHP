<?php include 'phoneBook_header.php'; ?>
			<main id="edit">
				<div>
					<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
						<label for="userid">Enter User ID</label>
						<input type="number" name="userid" id="userid" required="required"/>
						<input type="submit" value="Start Editing" name="submit3">
					</form>
				</div>
				<?php 
				session_start();
				if (isset($_POST['submit3'])) {
					$userid = $_POST['userid'];
					$db = new mysqli('localhost', 'root', '', 'phonebook');

					if($db->connect_errno > 0){
					    die('Unable to connect to database [' . $db->connect_error . ']');
					}
					$sql = <<<SQL
    						SELECT *
    						FROM book
    						WHERE iduser=$userid
SQL;
					if(!$result = $db->query($sql)){
						die('There was an error running the query [' . $db->error . ']');
					}

					$fname = "";
					while($row = $result->fetch_assoc()){
						$fname = $row['firstname'];
						$_SESSION['lastname'] = $row['lastname'];
						$_SESSION['city'] = $row['city'];
						$_SESSION['phone'] = $row['phone'];
						$_SESSION['email'] = $row['email'];
						$_SESSION['gender'] = $row['gender'];
						$_SESSION['notes'] = $row['notes'];
						$_SESSION['name'] = $row['name'];
						$_SESSION['size'] = $row['size'];
						$_SESSION['type'] = $row['type'];
						$_SESSION['file_path'] = $row['file_path'];
						$_SESSION['date'] = $row['date'];
					}

					if ($fname == "") {
						echo "<script>alert('Invalid User ID')</script>";
					} else {
						$_SESSION['firstname'] = $fname;
						$_SESSION['userid'] = $userid;
						header('Location: phonebook_EditEntry2.php');
					}
				}
				
			?>
			</main>
		</div>
	</body>
</html>