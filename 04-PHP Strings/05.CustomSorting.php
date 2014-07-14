<?php
	$nouns = array("Gesho", "Gancho", "Gogo", "Georgi", "Grigor");
	$sravnitel = 1;

	echo "Not sorted: ";
	foreach ($nouns as $key => $value) {
		echo "$value ";
	}

	echo "<br>";
	echo "<br>";

	for ($i=0; $i < count($nouns); $i++) { 
		$index = $i;
		for ($j=$i+1; $j < count($nouns); $j++) { 
			$str1 = $nouns[$j];
			$str2 = $nouns[$index];
			if ($str1[$sravnitel] < $str2[$sravnitel]) {
				$index = $j;
			}
		}
			$swap = $nouns[$i];
			$nouns[$i] = $nouns[$index];
			$nouns[$index] = $swap;
	}
	echo "Selection sort: ";
	foreach ($nouns as $key => $value) {
		echo "$value ";
	}

	echo "<br>";
	echo "<br>";
?>

<?php
	function cmp($a, $b) {
		$letterA = $a[1];
		$letterB = $b[1];

	    if ($letterA == $letterB) {
	        return 0;
		}

	    return ($letterA < $letterB) ? -1 : 1;
	}

	$nouns = array("Gesho", "Gancho", "Gogo", "Georgi", "Grigor");

	usort($nouns, "cmp");
	echo "With usort(php included function): ";
	foreach ($nouns as $key => $value) {
		echo "$value ";
	}
?>
