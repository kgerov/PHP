<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Forum</title>
		<style>
			html, body {margin: 0;}
			#wrapper {
				width: 960px;
				margin: 0 auto;
				background-color: #FFD652;
				color: #383838;
				padding: 15px;
				padding-top: 1px;
			}
			header h1 {
				text-align: center;
			}
			#wrapper > section {
				width: 250px;
				margin: 0 auto;
			}
			#wrapper > section h2 {
				text-align: center;
			}
			#wrapper > section input {
				border: none;
				padding: 4px;
			}
			#wrapper > section > form > input[type="password"]:nth-child(3) {
				margin-left: 12px;
			}
			#wrapper > section input[type=submit],  #wrapper > main > section:nth-child(1) > form > input[type="submit"]:nth-child(7) {
				background: none;
				border: 2px solid #383838;
				width: 150px;
				font-weight: bold;
				margin-left: 60px;
				margin-top: 15px;
				padding: 5px;
			}
			#wrapper > section input[type=submit]:hover, #wrapper > main > section:nth-child(1) > form > input[type="submit"]:nth-child(7):hover{
				background-color: #383838;
				color: #FFD652;
			}
			#wrapper main {
				width: 700px;
				margin: 30px auto;
			}
			#wrapper main section:nth-child(1) {
				width: 350px;
				margin: 0 auto;
			}
			#wrapper main section:nth-child(1) input, textarea {
				border: none;
				vertical-align: top;
				width: 250px;
				padding: 5px;
			}
			#wrapper > main > section:nth-child(1) > form > input[type="submit"]:nth-child(7) {
				width: 250px;
			}
			#wrapper > main > section:nth-child(1) > form > textarea {
				margin-left: 20px;
			}
			#wrapper > main > section:nth-child(1) > form > input[type="text"]:nth-child(3) {
				margin-left: 14px;
			}
			#wrapper > main > section:nth-child(1) > form > input[type="text"]:nth-child(5) {
				margin-left: 53px;
			}
			#wrapper main section:nth-child(1){
				margin-bottom: 20px;
			}
			#wrapper main section article {
				background-color: #FFE784;
				margin-bottom: 10px;
				padding: 10px 15px;
			}
			#wrapper main section article p {
				margin: 0;
				padding: 0;
				margin-top: 20px;
			}
			textarea {
				max-height: 30px;
				max-width: 250px;
			}
		</style>
	</head>
	<body>
		<div id="wrapper">
			<header>
				<h1>Forum</h1>
			</header>
			<section>
				<h2>Login</h2>
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"> 
					User Name <input type="text" required="required" name="username1" /><br/>
					Password <input type="password" required="required" name="password1" /><br/>
					<input type="submit" value="Submit" name="login-submit" />
				</form>
			</section>
			<?php 
				$user = "";
				$pass = "";
				$ready = false;
				if (!empty($_POST['username1'])) {
					$user = $_POST['username1'];
					$ready = true;
				}
				if (!empty($_POST['password1'])) {
					$pass = $_POST['password1'];
				}
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

				$userz = array();
				$passz = array();
				while ($currentRow = mysql_fetch_row($result)) {
	    			$userz[] = $currentRow[1];
	    			$passz[] = $currentRow[6];
				}

				$isValid = false;
				$index = -1;
				for ($i=0; $i < count($userz); $i++) { 
					if ($user == $userz[$i]) {
						$isValid = true;
						$index = $i;
					}
				}

				if (($isValid == true) && ($passz[$index]==$pass) && $ready==true) {
					echo "<script>alert('You logged in')</script>";
				} 
			?>
			<main>
				<section>
					<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
						Your Post <textarea name="post"></textarea><br/>
						Your Name<input type="text" required="required" name="publisher" /><br/>
						Date <input type="text" name="date" /><br/>
						<input type="submit" value="Submit" name="post-submit" />
					</form>
				</section>
				<?php 
					$post = "";
					$publisher = "";
					$date = "";
					if (isset($_POST['post']) && (isset($_POST['publisher'])) && (isset($_POST['date']))) {
						$post = $_POST['post'];
						$publisher = $_POST['publisher'];
						$date = $_POST['date'];
					}
					$dblink = mysql_connect("localhost", "root", "");

					if(!mysql_select_db("forum", $dblink)){
					    echo "Error";
					}
					$zaqvka = '"' . $post . '", "' . $publisher . '", "' . $date . '"';
					$zaqvkaModel =  'insert into articles (article, publisher, date) values (' . $zaqvka . ')';
					if (!($publisher = "")) {
						mysql_query ($zaqvkaModel, $dblink);
					}
				?>
				<section>
					<?php 
						$dblink = mysql_connect("localhost", "root", "");
						if(!mysql_select_db("forum", $dblink)){
						    echo "Error";
						}
						$query = "select * from articles";
						$result = mysql_query($query, $dblink);
						if (!$result) {
						    echo 'Error: ' . mysql_error() . "\n";
						    echo "Query: " . $query;
						}
						while ($currentRow = mysql_fetch_row($result)) {
							echo "<article>";
							echo "<div>";
						    echo $currentRow[0] . "</div>";
						    echo "<p>Publisher: ";
						    echo $currentRow[1] . "</p>";
						    echo "<span>Date: " . $currentRow[2] . "</span>";
							echo "</article>";
						}
					?>
				</section>
			</main>
		</div>
	</body>
</html>