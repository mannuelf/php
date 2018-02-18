<?php

class Car {

	var $wheels = 4;
	var $hood = 1;
	var $engine = 1;
	var $doors = 4;

	function __construct()
	{
		echo $this->wheels = 10;
	}

}

$mercedes = new Car();
$truck = new Car();
$bmw = new Car();
