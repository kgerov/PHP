<?php 
	$l1 = explode(" ", "a b a");
	$l2 = explode(" ", "b a b a");

	for ($i=0; $i < count($l2); $i++) { 
		$notinArray = true;
		for ($j=0; $j < count($l1); $j++) { 
			if ($l2[$i] == $l1[$j]) {
				$notinArray = false;
			}
		}
		if ($notinArray) {
			$l1[] = $l2[$i];
		}
	}

	foreach ($l1 as $key => $value) {
		echo "$value ";
	}
?>