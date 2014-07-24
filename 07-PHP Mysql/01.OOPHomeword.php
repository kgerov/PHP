<?php 
	$dblink = mysql_connect("localhost", "root", "");

	if(!(mysql_select_db("01.oophwrecreation", $dblink))){
	    echo "Can't access DB";
	}
	
	$query = "select * from users";
	$result = mysql_query($query, $dblink);
	if (!$result) {
	    echo 'Error: ' . mysql_error() . "\n";
	    echo "Query: " . $query;
	}

	$query2 = "select * from workman";
	$result2 = mysql_query($query2, $dblink);
	if (!$result2) {
	    echo 'Error: ' . mysql_error() . "\n";
	    echo "Query: " . $query2;
	}
	$payment = array();
	$profession = array();
	while ($currentRow = mysql_fetch_row($result2)) {
	    $profession[] = $currentRow[1];
	    $payment[] = $currentRow[2];
	}

	$iter = 0;
	while ($currentRow = mysql_fetch_row($result)) {
	    echo $currentRow[1] . "<br>";
	    echo $currentRow[2] . "<br>";
	    echo $currentRow[3] . "<br>";
	    echo $currentRow[4] . "<br>";
	    echo $currentRow[5] . "<br>";
	    echo $currentRow[6] . "<br>";
	    echo $currentRow[7] . "<br>";
	    echo $currentRow[8] . "<br>";
	    echo $currentRow[9] . "<br>";
	    echo $currentRow[10] . "<br>";
	    if ($iter >= 1) {
	    	echo $profession[$iter-1] . "<br>";
	    	echo $payment[$iter-1] . "<br>";
	    }
	    echo "<br>";
	    echo "<br>";
	    $iter++;
	}
?>