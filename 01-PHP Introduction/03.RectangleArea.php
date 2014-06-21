<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
	</head>
	<body>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			<span>Width:  </span><input type="text" name="width"/>
			<br/>
			<span>Height:  </span><input type="text" name="height"/>
			<input type="submit" name="Get Area"/>
		</form>
		<?php 
			$width = $_POST['width'];
			$height = $_POST['height'];
			$area = $width*$height; 
			echo $area;
		?> 
	</body>
</html>