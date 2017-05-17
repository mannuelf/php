<?php

class Car {

	function MoveWheels()
	{
		echo "Moving wheels";
	}

}

$bmw = new Car();
$mercedes = new Car();
$bmw->MoveWheels();
$mercedes->MoveWheels();
