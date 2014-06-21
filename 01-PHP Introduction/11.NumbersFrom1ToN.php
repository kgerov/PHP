<!DOCTYPE html>
<html>
	<body>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			Enter n: <input type="text" name="n"/><br/>
			<input type="submit" value="GO!">
		</form>
		<?php
			$n = $_POST['n'];
			for ($i=1; $i<=$n; $i++) 
			{ 
				echo $i . '<br>';
			}
		?>
	</body>
</html>