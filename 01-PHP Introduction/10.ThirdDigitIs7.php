<!DOCTYPE html>
<html>
	<head>
		<meta charset="URF-8">
		<title></title>
	</head>
	<body>
		<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			Enter number: <input type="text" name="num"><br/>
			<input type="submit" value="Get 3rd digit">
		</form>
		<?php 
			$num = $_POST['num'];
			$a = $num%10; $b = ($num-$a)/10%10; $c = ($num-10*$b-$a)/100%10;
			if ($c==7) {
				echo "True";
			} else {
				echo "False";
			}
		?>
	</body>
</html>