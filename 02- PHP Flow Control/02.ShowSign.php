<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
	</head>
	<body>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		Enter first number <input type="text" name="n1"/><br/>
		Enter second number <input type="text" name="n2"/><br/>
		Enter third number <input type="text" name="n3"/><br/>
		<input type="submit" value="Show Sign">
		</form>
		<?php 
			$nums = array($_POST['n1'], $_POST['n2'], $_POST['n3']);
			$counter = 0;
			foreach ($nums as $var) {
			 	if ($var < 0) {
			 		$counter++;
			 	}
			}
			if ($counter%2==0) {
				echo "The sign of the product is +";	
			}
			else {
				echo "The sign of the product is -";
			}
		?>
	</body>
</html>