<?php
	$xml = new XMLReader();
	$xml->open('dates.xml');

	$prev = "";
	while ($xml->read()) {
		if ($xml->name === "Year") {
			printf( '<h2>Dates in %1$s %2$d: </h2>', $xml->name, $xml->getAttribute('value'));

			while ($xml->read()) {
				if ($xml->name === "Month") {
					if ($prev != "Day") {
						echo "<span>" . $xml->getAttribute('value') . "</span>";	
					}
					$xml->read();
					$xml->read();
					if ($xml->name == "Day") {
						echo "<span> " . $xml->getAttribute('value') . "</span>";
						$prev = $xml->name;
						$xml->read();
					} else {
						if ($xml->name === "Year") {
							break;
						}
						$prev = $xml->name;
						echo "<span>" . $xml->getAttribute('value') . "</span>";
					}
					echo "<br>";
				}
			}
		}
	}

?>