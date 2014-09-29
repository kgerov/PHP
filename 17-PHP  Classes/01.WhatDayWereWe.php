<?php
	$d1=new DateTime("2014-11-09 11:14:15");
	echo "First date: " . $d1->format('Y-m-d') . "<br><br>";
	for ($i=1; $i <= 10; $i++) {
		$d1->add(new DateInterval('P10D'));
		echo "+ ". $i*10 . "days: " . $d1->format('Y-m-d') . "<br>";
	}
?>