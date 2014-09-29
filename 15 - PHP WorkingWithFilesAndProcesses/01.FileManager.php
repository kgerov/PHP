<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" <title></title>
	</head>
	<body>
		<div id="wrapper">
			<div>
				<h3 id="currDir"></h3>
			</div>
			<div>
				<form method="post" name="myForm">
					<input type="submit" value="Go Back" name="s" onClick="erase1()">
				</form>
				<div id="folder"><?php
					$c = getcwd();
					if (isset($_POST['s'])) {
						$cwd = getcwd();
						$i = strlen($cwd) - 1;
						while ($cwd[$i] != "\\") {
							$cwd = substr($cwd, 0, -1);
							$i--;
						}
						if ($cwd[$i-1] != ":") {
							$cwd = substr($cwd, 0, -1);
						}
						chdir($cwd);
						printFiles();
					} else {
						printFiles();
					}
					?></ul>
				</div>
			</div>
		</div>
		<script type="text/javascript">
			var s = <?php echo "$c";?>;
			console.log(s);
			document.getElementById('currDir').innerHTML = "Index of ";
			function erase1() {
				document.getElementById('folder').innerHTML = "";
				return false;
			}
		</script>
	</body>
</html>
<?php
	function printFiles() {
		$outputF = shell_exec("dir");
		preg_match_all('/[0-9]{2}\.[0-9]{2}\.[0-9]{4}(.?)+ ((.?)+)/', $outputF, $files, PREG_SET_ORDER);
		?><ul><?php 
		foreach ($files as $key => $value) {
			?>
				<li><a href=""><?php echo $value[2]; ?></a></li>
			<?php
		}
	}
?>