<?php
	$list1 = array("Hristo", "Hristo", "Nakov", "Nakov", "Petya");
	$list2 = array("Nakov", "Vanessa", "Maria");
	foreach ($list2 as $var1 => $value1) {
		foreach ($list1 as $var2 => $value2) {
			if ($value1 == $value2) {
				unset($list1[$var2]);
			}
		}
	}
	foreach ($list1 as $key => $value) {
		echo "$value ";
	}
?>