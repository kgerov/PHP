<!DOCTYPE html>
<html>
	<body>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			Enter n: <input type="text" name="n"/><br/>
			<input type="submit" value="Print">
		</form>
		<?php
			$n = $_POST['n'];
			$fib1 = 0;
			$fib2 = 1;
			$fib3 = 1;
			for ($i=0; $i < $n; $i++) { 
				if ($i == 0) {
					echo $fib1 . '<br>';
				} elseif ($i == 1) {
					echo $fib2 . '<br>';
				} elseif ($i == 2) {
					echo $fib3 . '<br>';
				} else {
					$fib1 = $fib2;
					$fib2 = $fib3;
					$fib3 = $fib1 + $fib2;
					echo $fib3 . '<br>';
				}
			}
		?>
	</body>
</html>