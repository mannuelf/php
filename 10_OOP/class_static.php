<?php

class Car {

	static $wheels = 4; // can use i any where, use it without having to new up an instance of Car
	var $hood = "hood";

	function MoveWheels()
	{
		Car::$wheels = 10;
	}
}
$bmw = new Car();
Car::MoveWheels(); // call static data
echo Car::$wheels;

