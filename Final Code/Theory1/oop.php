<?php
	class Fruit {
		private $name;

		public function __construct($name) {
			$this->name = $name;
		}

		function setName($name) {
			$this->name = $name;
		}

		function getName() {
			return $this->name;
		}
	}

	$apple = new Fruit("apple");
	echo $apple->getName() . "<br>";
	$apple->setName("apple1");
	echo $apple->getName() . "<br>";

	$mango = new Fruit("mango");
	echo $mango->getName() . "<br>";
?>