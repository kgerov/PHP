<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
	</head>
	<body>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			Enter numbers: <input type="text" name="line"/><br/>
			<input type="submit" value="Submit"/>
		</form>
		<?php 
			$line = $_POST['line'];
			$nums = preg_split("/[\s,]+/", $line);
			$evenSum = 1;
			$oddSum = 1;
			for ($i=0; $i < count($nums); $i++) { 
				if ($i%2==0) {
					$oddSum *= $nums[$i];
				} else {
					$evenSum *= $nums[$i];
				}
			}

			if ($oddSum == $evenSum) {
				echo "yes" . "<br>";
				echo "product = " . $evenSum;
			} else {
				echo "no" . "<br>";
				echo "odd_product = " . $oddSum . "<br>";
				echo "even_product = " . $evenSum;
			}
		?>
	</body>
</html>