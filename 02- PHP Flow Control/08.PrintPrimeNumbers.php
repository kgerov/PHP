<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
	</head>
	<body>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			Prime numbers from 1 to <input type="text" name="n"/><br/>
			<input type="submit" value="Print">	
		</form>
		<?php 
			$n = $_POST['n'];
			for ($i=1; $i <= $n; $i++) { 
				$isPrime = true;
				for ($j=2; $j < $i; $j++) { 
					if ($i%$j==0) {
						$isPrime = false;
					}
				}
				if ($isPrime == true) {
					echo $i . '<br>';
				}
			}
		?>
	</body>
</html>