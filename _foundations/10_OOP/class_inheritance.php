<?php

class Car {

	var $wheels = 4;
	var $hood = 1;
	var $engine = 1;
	var $doors = 4;

	function MoveWheels()
	{
		$this->wheels = 10;
	}

	// have methods change properties
	function createDoors()
	{
		$this->doors = 6;
	}

}

class Plane extends Car {
	var $wheels = 20;
}

$bmw = new Car();

$jet = new Plane();

echo $jet->wheels;

// if (class_exists("Plane")) {
// 	echo "plane exists";
// }
