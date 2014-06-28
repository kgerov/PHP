<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
	</head>
	<body>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			Enter int 1: <input type="text" name="n1"/><br/>
			Enter int 2: <input type="text" name="n2"/><br/>
			Enter int 3: <input type="text" name="n3"/><br/>
			<input type="submit" value="Sort!">
		</form>
		<?php 
			$n1 = $_POST['n1'];
			$n2 = $_POST['n2'];
			$n3 = $_POST['n3'];
			if ($n2 > $n1) {
				$temp = $n2;
				$n2 = $n1;
				$n1 = $temp;
			}
			if ($n3 > $n2) {
				$temp = $n2;
				$n2 = $n3;
				$n3 = $temp;
				if ($n2 > $n1) {
					$temp = $n2;
					$n2 = $n1;
					$n1 = $temp;
			}
			}
			echo "Order: " . $n1 . " " . $n2 . " ". $n3;
		?>
	</body>
</html>