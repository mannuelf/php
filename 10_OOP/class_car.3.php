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

$bmw = new Car();

$truck = new Car();
$truck->createDoors();

echo $bmw->wheels . "<br>";
echo $truck->wheels = 10;
echo $truck->doors;
