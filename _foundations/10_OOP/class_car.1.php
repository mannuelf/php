<?php

class Car {

	function MoveWheels()
	{
		echo "Moving wheels";
	}

}

if(method_exists("Car", "MoveWheels")) {
	echo "The Method Exists";
} else {
	echo "It does not";
}
