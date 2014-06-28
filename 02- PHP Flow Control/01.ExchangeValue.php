<!DOCTYPE html>
<html>
	<body>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			Enter int 1: <input type="text" name="n1"/><br/>
			Enter int 2: <input type="text" name="n2"/><br/>
			<input type="submit" value="Compile">
		</form>
		<?php
			$n1 = $_POST['n1'];
			$n2 = $_POST['n2'];

			if ($n1 > $n2) {
				$temp = $n1;
				$n1 = $n2;
				$n2 = $temp;
				echo "Values exchanged!" . '<br>';
			}
			echo "Int 1 now equals " . $n1 . '<br>';
			echo "Int 2 now equals " . $n2;
		?>
	</body>
</html>