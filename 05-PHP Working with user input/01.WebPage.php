<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Form</title>
		<style type="text/css">
			body, ul, header, footer, section, article, ul, li, a, span, nav, h1, h2, h3, aside, div {
			    box-sizing: border-box;
			    margin: 0;
			    moz-box-sizing: border-box;
			    padding: 0;
			    webkit-box-sizing: border-box;
			}

			#wrapper {
				width: 550px;
				margin: 10px auto;
			}

			#wrapper > div:nth-child(1) {
				padding: 15px;
				width: 270px;
				border: 1px solid black;
				border-radius: 10px;
				margin: 0 auto 25px;
				font-size: 10pt;
			}
			#wrapper > div:nth-child(1) input[type=password]{
				margin-left: 8px;
			}

			#wrapper > div:nth-child(1) input[type=submit]{
				width: 92px;
				padding: 3px;
				background-color: lightgreen;
				font-weight: bold;
				margin-left: 15px;
				margin-top: 10px;
			}

			#wrapper > div:nth-child(2) form > div {
				width: 100%;
				margin-bottom: 25px;
			}

			#wrapper > div:nth-child(2) form > div input {
				width: 200px;
				height: 25px;	
				float: right;
			}

			#wrapper > div:nth-child(2) form > div input[type=radio] {
				width: 30px;
				height: 13px;
				float: none;
			} 

			#wrapper > div:nth-child(2) form > div:nth-child(10) input {
				width: 57px;
				height: 25px;
				margin-left: 10px;
			} 

			#wrapper > div:nth-child(2) input[type=submit] {
				width: 150px;
				background: none;
				border: none;
				color: green;
				font-weight: bold;
				border: 1px solid green;
				padding: 15px;
				margin-top: 25px;
				margin-left: 200px;
			}

			#wrapper > div:nth-child(2) input[type=submit]:hover {
				background-color: green;
				color: white;
			}

			#wrapper > div:nth-child(2) > form > div:nth-child(9) > span {
				margin-right: 300px;
			}

		</style>
	</head>
	<body>
		<div id="wrapper">
			<div>
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
						User Name <input type="text" required="required" name="username1" /><br/>
						Password <input type="password" required="required" name="password1" /><br/>
						<input type="submit" value="Submit" name="login-submit" />
						<input type="submit" value="EDIT" name="edit-submit" />
				</form>
			</div>
			<div>
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
				<div>
					<span>User Name*</span>
					<input type="text" required="required" name="username"/>
				</div>
				<div>
					<span>Password*</span>
					<input type="password" required="required" name="password" />
				</div>
				<div>
					<span>Repeat Password*</span>
					<input type="text" required="required" name="secondPass" />
				</div>
				<div>
					<span>Secret Question*</span>
					<input type="text" required="required" name="question" />
				</div>
				<div>
					<span>Secret Answer*</span>
					<input type="text" required="required" name="answer" />
				</div>
				<div>
					<span>Email</span>
					<input type="email" name="email" />
				</div>
				<div>
					<span>First Name*</span>
					<input type="text" required="required" name="fname" />
				</div>
				<div>
					<span>Last Name*</span>
					<input type="text" required="required" name="lname" />
				</div>
				<div>
					<span>Sex*</span>
					<input type="radio" name="gender" value="male" />male
					<input type="radio" name="gender" value="female" />female
				</div>
				<div>
					<span>Birthday*</span>
					<input type="text" required="required" name="day" />
					<input type="text" required="required" name="month" />
					<input type="text" required="required" name="year" />
				</div>
				<input type="submit" value="Create Profile" name="register-submit" />
			</form> 
			</div>
		</div>
	<?php
		if (!empty($_POST['login-submit'])) {
			$file = "db/UserLogs.txt";
			$currentFile = fopen($file, 'a');
			$filez = "User Name: " . $_POST['username1'] . "\r\n";
			fwrite($currentFile, $filez);
			$filez = "\r\n";
			$filez = "\r\n";
			fwrite($currentFile, $filez);
			fclose($currentFile);
			echo "<script>alert('Success');</script>";
		}
	?>
	<?php
	if (!empty($_POST['register-submit'])) {
		if ($_POST['password'] == $_POST['secondPass']) {
			$file = "db/Profiles.txt";
			$currentFile = fopen($file, 'a');
			$filez = "Username: " . strtolower($_POST['username']) . "\r\n";
			fwrite($currentFile, $filez);
			$filez = "Password: " . $_POST['password'] . "\r\n";
			fwrite($currentFile, $filez);
			$filez = "Secret Question: " . $_POST['question'] . "\r\n";
			fwrite($currentFile, $filez);
			$filez = "Secret Answer: " . $_POST['answer'] . "\r\n";
			fwrite($currentFile, $filez);
			if (!empty($_POST['email'])) {
				$filez = "Email: " . $_POST['email'] . "\r\n";
			}
			else{
				$filez = "Email: - \r\n";
			}
			fwrite($currentFile, $filez);
			$filez = "First Name: " . $_POST['fname'] . "\r\n";
			fwrite($currentFile, $filez);
			$filez = "Last Name: " . $_POST['lname'] . "\r\n";
			fwrite($currentFile, $filez);
			if (isset($_POST['male'])) {
				$filez = "Sex: Male" . "\r\n";
			}
			else{
				$filez = "Sex: Female" . "\r\n";
			}
			fwrite($currentFile, $filez);
			$filez = "Birthday: " . $_POST['day']. " ". $_POST['month']. " " . $_POST['year']. " " . "\r\n";
			fwrite($currentFile, $filez);
			$filez = "\r\n";
			fwrite($currentFile, $filez);
			fclose($currentFile);
		}
		else{
			echo("<script>alert('Check your passwords mate');</script>");
		}
	}
	?>
	<?php 
		if (!empty($_POST['edit-submit'])) {
			header("Location: http://localhost/test/02.EditProfile.php");
		}
	?>
	</body>
</html>
