<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
	</head>
	<body>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			Enter n: <input type="text"  name="n"/><br/>
			<input type="submit" value="Draw Matrix">
		</form>
		<?php 
			$n = $_POST['n'];
			
			for ($i=0; $i < $n; $i++) { 
				$ind = $i + 1;
				for ($j=0; $j < $n; $j++) { 
					echo $ind . " ";
					$ind++;
				}
				echo "<br>";
			}
		?>
	</body>
</html>