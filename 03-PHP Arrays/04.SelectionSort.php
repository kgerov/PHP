<?php
	$nums = array(2, 4, 3, 1, 7, 8, 2, 6, 10);

	for ($i=0; $i < count($nums); $i++) { 
		$index = $i;
		for ($j=$i+1; $j < count($nums); $j++) { 
			if ($nums[$j] < $nums[$index]) {
				$index = $j;
			}
		}
			$swap = $nums[$i];
			$nums[$i] = $nums[$index];
			$nums[$index] = $swap;
	}
	foreach ($nums as $key => $value) {
		echo "$value ";
	}
?>