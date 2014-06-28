<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Point in Circle</title>
	</head>
	<body>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			X-Coordinates: <input type="text" name="x"/><br/>
			Y-Coordinates: <input type="text" name="y"/><br/>
			<input type="submit" value="Check">
		</form>
		<?php 
			$x = $_POST['x'];
			$y = $_POST['y'];
			$distance = sqrt(pow($x, 2) - pow($y, 2));
			if ($distance <= 2) {
				echo "true";
			}
			else {
				echo "false";
			}
		?>
	</body>
</html>