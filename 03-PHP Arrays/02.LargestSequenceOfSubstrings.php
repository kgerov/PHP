<?php 
	$words = array("hello");
	$maxCounter = 0;
	$currCounter = 1;
	$mostRepeat = "";
	$currWord = "";

	foreach ($words as $key => $value) {
		if ($key == 0) {
			$currWord = $value;
		} elseif ($currWord != $value) {
			$currCounter = 1;
			$currWord = $value;
		}
		else {
			$currCounter++;
		}


		if ($currCounter > $maxCounter) {
			$maxCounter = $currCounter;
			$mostRepeat = $value;
		}
	}

	for ($i=0; $i < $maxCounter; $i++) { 
		echo ($mostRepeat) . " ";
	}
?>