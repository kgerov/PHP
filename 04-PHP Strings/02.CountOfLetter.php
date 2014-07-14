<?php 
	$list = array("h", "d", "h", "a", "a", "a", "s", "d", "f", "d", "a", "d", "j", "d", "s", "h", "a", "a");
	$letterCount = array();

	$listString = implode("", $list);
	foreach ($list as $key => $value) {
		if (!(in_array($value, $letterCount))) {
			$letterCount[$value] = substr_count($listString, $value);
		}
	}
	ksort($letterCount);
	var_dump($letterCount)
?>