<?php
	$nums = array(2, 3, 4, 1, 50, 2, 3, 4 , 5);
	$sequnces = array();
	$currArray = array();
	$isNew = true;
	foreach ($nums as $key => $value) {
		if ($isNew) {
			$currArray[] = $value;
			$isNew = false;
		} elseif ($value > $nums[$key-1]) {
			$currArray[] = $value;
		} else {
			$sequnces[] = $currArray;
			$currArray = array();
			$currArray[] = $value;
		}
	}
	$sequnces[] = $currArray;
	$max = 0;
	
	foreach ($sequnces as $key => $value) {
		$curr = 0;
		foreach ($value as $var) {
			echo $var . " ";
			$curr++;
		}
		echo "<br>";
		if ($curr > $max) {
			$max = $curr;
			$currArray = array();
			$currArray = $value;
		}
	}
	echo "Max string: ";
	foreach ($currArray as $key => $value) {
		echo $value . " ";
	}
?>