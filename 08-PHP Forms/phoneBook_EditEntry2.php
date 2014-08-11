<?php include 'phoneBook_header.php'; ?>
			<main>
				<div>
					<form enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
						<div><label for="firstname">First Name</label>
						<input type="text" name="firstname" id="firstname" required="required"/></div>
						<div><label for="lastname">Second Name</label>
						<input type="text" name="lastname" id="lastname" required="required"/></div>
						<div><label for="city">City</label>
						<input type="text" name="city" id="city" required="required"/></div>
						<div><label for="phone">Phone</label>
						<input type="tel" name="phone" id="phone" required="required"/></div>
						<div><label for="email">Email</label>
						<input type="email" name="email" id="email"/></div>
						<div><label for="male">Male</label>
						<input type="radio" name="gender" value="male" id="male"/>
						<label for="female">Female</label>
						<input type="radio" name="gender" value="female" id="female"/></div>
						<div><label for="notes">Additional Notes</label></div>
						<div><textarea id="notes" name="notes"></textarea></div>
						<div><!-- <input name="MAX_FILE_SIZE" value="102400" type="hidden"> -->
						<input type="file" name="photo" size="25"/></div>
						<div><input type="submit" value="Edit Entry" name="Submit1"></div>
						<div><input type="submit" value="DELETE USER" name="delete"></div>
					</form>
					<?php 
						session_start();
						$userid = $_SESSION['userid'];
						$firstname = $_SESSION['firstname'];
						$lastname = $_SESSION['lastname'];
						$city = $_SESSION['city'];
						$phone = $_SESSION['phone'];
						$email = $_SESSION['email'];
						$gender = $_SESSION['gender'];
						$notes = $_SESSION['notes'];
						$date = $_SESSION['date'];
					?>
					<script>
						document.getElementById('firstname').value = "<?php Print($firstname); ?>";
						document.getElementById('lastname').value = "<?php Print($lastname); ?>";
						document.getElementById('city').value = "<?php Print($city); ?>";
						document.getElementById('phone').value = "<?php Print($phone); ?>";
						document.getElementById('email').value = "<?php Print($email); ?>";
						var gender = "<?php Print($gender); ?>";
						if (gender == "male") {
							document.getElementById("male").checked = true;
						} else if(gender == "female") {
							document.getElementById("female").checked = true;
						}
						document.getElementById('notes').value = "<?php Print($notes); ?>";
					</script>
				</div>
			</main>
		</div>
	</body>
</html>

<?php 
	class User {
		public $firstname;
		public $lastname;
		public $city;
		public $phone;
		public $email;
		public $gender;
		public $notes;
		public $data;
		public $time;
		public $name;
		public $size;
		public $type;
		public $file_path;

		function __construct($firstname, $lastname, $city, $phone, $email, $gender, $notes, $data, $time, $name, $size, $type, $file_path) {
			$this->firstname = $firstname;
			$this->lastname = $lastname;
			$this->city = $city;
			$this->phone = $phone;
			$this->email = $email;
			$this->gender = $gender;
			$this->notes = $notes;
			$this->data = $data;
			$this->time = $time;
			$this->name = $name;
			$this->size = $size;
			$this->type = $type;
			$this->file_path = $file_path;
		}
	}

	if (isset($_POST['delete'])) {
		$db = new mysqli('localhost', 'root', '', 'phonebook');

		if($db->connect_errno > 0){
		    die('Unable to connect to database [' . $db->connect_error . ']');
		}
		$sql = "DELETE FROM `book` WHERE `iduser`=$userid";
		if(!$result = $db->query($sql)){
			die('There was an error running the query [' . $db->error . ']');
		}
		header('Location: phonebook_DisplayAll.php');
	}
	if (isset($_POST['Submit1'])) {
		
		define('UPLOAD_PATH', $_SERVER['DOCUMENT_ROOT'] . '/uploads/');
		define('DISPLAY_PATH', '/uploads/');
		define('MAX_FILE_SIZE', 2000000);
		$permitted = array('image/jpeg', 'image/pjpeg', 'image/png', 'image/gif');

		if ($_FILES['photo']['size'] > 0) {
			$fileName = $_FILES['photo']['name'];
			$tmpName = $_FILES['photo']['tmp_name'];
			$fileSize = $_FILES['photo']['size'];
			$fileType = $_FILES['photo']['type'];
		
			$ext = substr(strrchr($fileName, "."), 1);
			$randName = md5(rand() * time());

			$myfile = $randName . '.' . $ext;
			$path = UPLOAD_PATH . $myfile;

			if (in_array($fileType, $permitted) && $fileSize > 0 && $fileSize <= MAX_FILE_SIZE) {
				$result = move_uploaded_file($tmpName, $path);

				if (!$result) {
					echo "Error uploading image file";
					exit;
				}

			} else {
				//echo 'error upload file';
			}
		} else {
			$myfile = $_SESSION['name'];
			$fileSize = $_SESSION['size'];
			$fileType = $_SESSION['type'];
			$path = $_SESSION['file_path'];
		}

		if (isset($_POST['gender'])) {
			$gen = $_POST['gender'];
		} else {
			$gen = "no";
		}

		$user = new User($_POST['firstname'], $_POST['lastname'], $_POST['city'], $_POST['phone'], $_POST['email'], $gen, $_POST['notes'], "lqlqlq", $date, $myfile, $fileSize, $fileType, $path);

		$legit = true;
		$m = "Invalid:";
		$pattern = '/^[a-zA-Z0-9]+_?[a-zA-Z0-9]+$/D';

	   	if (preg_match($pattern, $user->firstname) != 1){
	   		$legit=false;
	   		$m .= " FirstName";
    	}

    	if (preg_match($pattern, $user->lastname) != 1){
	   		$legit=false;
	   		$m .= " LastName";
    	}

    	if (preg_match($pattern, $user->city) != 1){
	   		$legit=false;
	   		$m .= " City";
    	}

    	// if (preg_match($pattern, $user->phone) != 1){
	   	// 	$legit=false;
	   	// 	$m .= " Phone";
    	// }

		if ($legit) {
			$con=mysqli_connect("localhost","root","","phonebook");
			if (mysqli_connect_errno()) {
			  echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}

			$firstname = mysqli_real_escape_string($con, $user->firstname);
			$lastname = mysqli_real_escape_string($con, $user->lastname);
			$city = mysqli_real_escape_string($con, $user->city);
			$phone = mysqli_real_escape_string($con, $user->phone);
			$email = mysqli_real_escape_string($con, $user->email);
			$gender = mysqli_real_escape_string($con, $user->gender);
			$notes = mysqli_real_escape_string($con, $user->notes);
			$data = mysqli_real_escape_string($con, $user->data);
			$time = mysqli_real_escape_string($con, $user->time);
			$name = mysqli_real_escape_string($con, $user->name);
			$size = mysqli_real_escape_string($con, $user->size);
			$type = mysqli_real_escape_string($con, $user->type);
			$file_path = mysqli_real_escape_string($con, $user->file_path);

			$sql="UPDATE book SET firstname='$firstname', lastname='$lastname', city='$city', phone='$phone', email='$email', gender='$gender', notes='$notes', date='$date', name='$name', size='$size', type='$type', file_path='$file_path' WHERE iduser=$userid";
			if (!mysqli_query($con,$sql)) {
			  die('Error: ' . mysqli_error($con));
			}

			mysqli_close($con);
			header('Location: phonebook_DisplayAll.php');
		} else {
			echo "<script>alert('$m')</script>;";
		}
	}
?>