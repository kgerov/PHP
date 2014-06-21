<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Daamnn</title>
	</head>
	<body>
		<h2>Check if a number is devisable by 2 and 9</h2>
		<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			Enter number <input type="text" name="num"/><br/>
			<input type="submit" value="Check"/>
		</form>
		<?php 
		$num = $_POST['num'];
		$isDevisable = ($num%2==0 && $num%9==0);
		echo $isDevisable ? "True" : "False" ;
		?>
	</body>
</html>