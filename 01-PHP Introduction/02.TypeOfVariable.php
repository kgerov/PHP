<?php
$name = "Swaggaa";
$number = 5;
$ion = true;
$money = 2.5;
$students = array("bate gencho", "bate gosho", "bate encho");
$nothing = NULL;

echo($name . " is " .gettype($name)) . "<br/>";
echo($number . " is " . gettype($number)) . "<br/>";
echo($ion . " is " .gettype($ion)) . "<br/>";
echo($money . " is " . gettype($money)) . "<br/>";
print_r($students); 
echo (" is " . gettype($students)) . "<br>";
echo($nothing . " is " . gettype($nothing)) . "<br/>";
?>