<?php 
	class WorkmanException extends Exception {
	    public function __construct() {
	        parent::__construct('-------------------WORKMAN INPUT ERROR!-----------------<br>', 101);
	    }
	}

	class User
	{
		public $fname;
		public $lname;
		public $age;
		public $profile_pic;
		public $sex;
		public $password;
		public $security_question;
		public $security_answer;
		public $email;
		public $cars = array();

		function __construct($fname, $lname, $age, $profile_pic, $sex, $password, $security_question, $security_answer, $email, $cars)
		{
			$this->fname = $fname;
			$this->lname = $lname;
			$this->age = $age;
			$this->profile_pic = $profile_pic;
			$this->sex = $sex;
			$this->password = $password;
			$this->security_question = $security_question;
			$this->security_answer = $security_answer;
			$this->email = $email;
			$this->cars = $cars;
		}
	}

	class Workman extends User {
		public $profession = array();
		public $payment;

		function __construct($fname, $lname, $age, $profile_pic, $sex, $password, $security_question, $security_answer, $email, $cars, $profession, $payment) {
			parent::__construct($fname, $lname, $age, $profile_pic, $sex, $password, $security_question, $security_answer, $email, $cars);
			try {
				$pattern = '/^[a-zA-Z0-9]+_?[a-zA-Z0-9]+$/D';

				foreach ($profession as $key => $value) {
					if (preg_match($pattern, $value) != 1) {
						Throw new WorkmanException();
					}
				}

			   	if (($payment < 0 || $payment > 10000)){
			    	Throw new WorkmanException();
		    	}

				$this->profession = $profession;
				$this->payment = $payment;
			} catch (WorkmanException $e) {
			    echo "Custom Exception, input not matching regex!"."<br/>";
			    echo $e->getMessage()." / code: ".$e->getCode();
			}  catch (Exception $e) {
				echo 'Invalid input';
			}
		}

		function checkProfession($search) {
			foreach ($this->profession as $key => $value) {
				if ($value == $search) {
					return true;
				}
			}
		}
	}

	$pich = new User("Gosho", "Georgiev", "25", "../pictures/goshosexa.jpg", "male", "bastun", "Am i pich", "Yes", "goshosexa@abv.bg", array("BMW", "Pagani")); 
	echo "First Name: " . $pich->fname . "<br>";
	echo "Last Name: " . $pich->lname . "<br>";
	echo "Age: " . $pich->age . "<br>";
	echo "Profile pic url: " . $pich->profile_pic . "<br>";
	echo "Sex: " . $pich->sex . "<br>";
	echo "Pass: " . $pich->password . "<br>";
	echo "Securirty question: " . $pich->security_question . "<br>";
	echo "Security answer: " . $pich->security_answer  . "<br>";
	echo "Email: " . $pich->email . "<br>";
	echo "Cars: ";

	foreach ($pich->cars as $key => $value) {
		if ($key != 0) {
			echo ", ";
		}
		echo "$value";
	}
	echo "<br>";
	echo "<br>";

	$rabotesht_pich = new Workman("Pesho", "Vaksata", "35", "../pictures/peshosexa.jpg", "female", "batka", "Am i batka", "Yes", "peshosexa@abv.bg", array("Golf", "Trabant"), array("Electronics", "Engine"), -360); 
	echo "First Name: " . $rabotesht_pich->fname . "<br>";
	echo "Last Name: " . $rabotesht_pich->lname . "<br>";
	echo "Age: " . $rabotesht_pich->age . "<br>";
	echo "Profile pic url: " . $rabotesht_pich->profile_pic . "<br>";
	echo "Sex: " . $rabotesht_pich->sex . "<br>";
	echo "Pass: " . $rabotesht_pich->password . "<br>";
	echo "Securirty question: " . $rabotesht_pich->security_question . "<br>";
	echo "Security answer: " . $rabotesht_pich->security_answer  . "<br>";
	echo "Email: " . $rabotesht_pich->email . "<br>";
	echo "Cars: ";

	foreach ($rabotesht_pich->cars as $key => $value) {
		if ($key != 0) {
			echo ", ";
		}
		echo "$value";
	}

	echo "<br>";
	echo "Professions: ";
	foreach ($rabotesht_pich->profession as $key => $value) {
		if ($key != 0) {
			echo ", ";
		}
		echo "$value";
	}

	echo "<br>";
	echo "Desired payment: " . $rabotesht_pich->payment;

	echo "<br>";
	echo "<br>";

	$rabotesht_pich2 = new Workman("Ganka", "janka", "15", "../pictures/gankasexa.jpg", "female", "baba", "Am i shieeeet", "Yes", "gankasexa@abv.bg", array("Trabant1", "Trabant2", "Trabant3"), array("_Brake", "Engine"), 160); 
	echo "First Name: " . $rabotesht_pich2->fname . "<br>";
	echo "Last Name: " . $rabotesht_pich2->lname . "<br>";
	echo "Age: " . $rabotesht_pich2->age . "<br>";
	echo "Profile pic url: " . $rabotesht_pich2->profile_pic . "<br>";
	echo "Sex: " . $rabotesht_pich2->sex . "<br>";
	echo "Pass: " . $rabotesht_pich2->password . "<br>";
	echo "Securirty question: " . $rabotesht_pich2->security_question . "<br>";
	echo "Security answer: " . $rabotesht_pich2->security_answer  . "<br>";
	echo "Email: " . $rabotesht_pich2->email . "<br>";
	echo "Cars: ";

	foreach ($rabotesht_pich2->cars as $key => $value) {
		if ($key != 0) {
			echo ", ";
		}
		echo "$value";
	}

	echo "<br>";
	echo "Professions: ";
	foreach ($rabotesht_pich2->profession as $key => $value) {
		if ($key != 0) {
			echo ", ";
		}
		echo "$value";
	}

	echo "<br>";
	echo "Desired payment: " . $rabotesht_pich2->payment;

	echo "<br>";
	echo "<br>";

	$work_people;
	$work_people[] = $rabotesht_pich;
	$work_people[] = $rabotesht_pich2;

	$search = "Engine";
	echo "You search for profession: $search" . "<br>";
	echo "Workman with that professions: " . "<br>";

	$counter = 1;
	foreach ($work_people as $key => $value) {
		if($value->checkProfession($search)) {
			echo $counter. ". " . $value->fname ."<br>";
		}
		$counter++;
	}


	$db = @ new mysqli('localhost', 'root', '', 'phonebook11');

	if($db->connect_errno > 0){
	    die('Unable to connect to database [' . $db->connect_error . ']');
	}
	$sql = <<<SQL
			SELECT *
			FROM book
			WHERE iduser=$userid
SQL;
	if(!$result = $db->query($sql)){
		die('There was an error running the query [' . $db->error . ']');
	}
?>