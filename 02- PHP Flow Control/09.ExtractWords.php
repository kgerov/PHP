<?php 
	function makeSet ($names) {
		$set = array();
		$i = 0;
		foreach ($names as $var) {
			$isImported = false;
			foreach ($set as $v) {
				if ($var == $v) {
					$isImported = true;
				}
			}
			if ($isImported == false) {
				$set[$i] = $var;
				$i++;
			}
		}
		return $set;
	}

	$names = array("Nakov", "Svetlin", "Nakov", "Pesho", "Mario", "Dimityr", "Georgi", "Mario");
	$set = makeSet($names);
	foreach ($set as $var) {
		echo $var . " ";
	}
?>
