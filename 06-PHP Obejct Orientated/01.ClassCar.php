<?php 
	class Car {
		public $model;
		public $pyear;
		public $trade;
		public $engine;

		public function __construct($model, $pyear, $trade, $engine) {
			$this->model = $model;
			$this->pyear = $pyear;
			$this->trade = $trade;
			$this->engine = $engine;
		}
	}

	$nissan = new Car("350 Z", 2002, "NISSAN", "V6");
	echo "Model: " . $nissan->model;
	echo "<br>";
	echo "Production Year: " . $nissan->pyear;
	echo "<br>";
	echo "Trademark: " . $nissan->trade;
	echo "<br>";
	echo "Engine Size: " . $nissan->engine;
?>