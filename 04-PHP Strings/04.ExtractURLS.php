<?php 
	$counter = 0;
	$text = "The site nakov.com can be access from
	 http://nakov.com or www.nakov.com. It has subdomains like mail.nakov.com and svetlin.nakov.com. 
	 Please check http://blog.nakov.com for more information.";
	
	$words = explode(" ", $text);
	$pattern = '/(http:\/\/|(www.)|https:\/\/)([a-zA-Z0-9.-])+[.](com|bg|net|gov|org|ru|co.uk)/';

	foreach ($words as $key => $value) {
    	if (preg_match($pattern, $value) === 1) {
			$counter++;
		}
	}

	echo "Number of urls: $counter";
?>