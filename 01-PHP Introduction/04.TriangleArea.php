<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Triangle Area</title>
	</head>
	<body>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			Point A coordinates: <input type="text" name="ax"/>
			<input type="text" name="ay"/><br/>
			Point B coordinates: <input type="text" name="bx"/>
			<input type="text" name="by"/><br/>
			Point C coordinates: <input type="text" name="cx"/>
			<input type="text" name="cy"/><br/>
			<input type="submit" name="Get Area"/>
		</form>
		<?php
			$ax = $_POST['ax'];
			$ay = $_POST['ay'];
			$bx = $_POST['bx'];
			$by = $_POST['by'];
			$cx = $_POST['cx'];
			$cy = $_POST['cy'];
			$area = abs(($ax*($by-$cy)+$bx*($cy-$ay)+$cx*($ay-$by))/2);
			echo "Area is: " . round($area);
		?>
	</body>
</html>