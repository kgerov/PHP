<!DOCTYPE html>
<html>
	<head>
		<style type="text/css">
			table, td, tr {
				border-collapse: collapse;
				border: 1px solid black;
				padding: 10px;
			}
			select {
				width: 50px;
			}
			table tr:nth-child(odd) td:nth-child(1) {
				background-color: #66D9EF;
				color: red;
			}
			table tr:nth-child(2) td:nth-child(1) {
				color: #E3BA88;
			}
		</style>
	</head>
	<body>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		<table>
			<tr>
				<td>Enter First Number</td>
				<td><input type="text" name="n1"/></td>
			</tr>
			<tr>
				<td>Select Operator</td>
				<td>
					<select name="sign">
					  <option value="+" selected="selected">+</option>
					  <option value="-">-</option>
					  <option value="*">*</option>
					  <option value="/">/</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Enter Second Number</td>
				<td><input type="text" name="n2"/></td>
			</tr>
			<tr>
				<td> </td>
				<td><input type="submit" value="Calculate"></td>
			</tr>
		</form>
		<?php
			$n1 = "";
			$n2 = "";
			$sign = "";
			if(isset($_POST['n1'])) {
				$n1 = $_POST['n1'];
			}
			if(isset($_POST['n2'])) {
				$n2 = $_POST['n2'];
			}
			if(isset($_POST['sign'])) {
				$sign = $_POST['sign'];
			}
			$result = "";
			switch ($sign) {
				case '+':
					$result = $n1+$n2;
					break;
				case '-':
					$result = $n1-$n2;
					break;
				case '*':
					$result = $n1*$n2;
					break;
				case '/':
					if ($n2 == 0) {
						$result = "error";
					} else {
						$result = $n1/$n2;
					}
					break;				
				default:
					$result = "error";
					break;
			}
		?>
		<tr>
				<td>Output = </td>
				<td>
					<?php echo "$result"; ?>
				</td>
			</tr>
		</table>
	</body>
</html>