<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
	</head>
	<body>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			Enter String <input type="text" name="str"><br/>
			<input type="submit" value="Display">
		</form>
		<?php
			$str = $_POST['str'];
			echo htmlspecialchars($str);
		?>
	</body>
</html>