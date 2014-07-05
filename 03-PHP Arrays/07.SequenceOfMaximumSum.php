<?php
	$nums = array(2, 3, -6, -1, 2, -1, 6, 4, -8, 8);
	$isFirst = true;
	$maxSum = "";
	$max = array();
	for ($i=0; $i < count($nums); $i++) { 
		$stop = count($nums);
		while ($stop > $i+1) {
			$currSum = $nums[$i];
			$curr = array($nums[$i]);
			for ($j=$i+1; $j < $stop; $j++) { 
				$currSum+=$nums[$j];
				$curr[] = $nums[$j];
			}	
			if ($isFirst) {
				$maxSum = $currSum;
				$isFirst = false;
			}
			if ($currSum >= $maxSum) {
				$maxSum = $currSum;
				$max = $curr;
			}
			$stop--;
		}
	}

	echo $maxSum . "<br>";

	var_dump($max);
?>