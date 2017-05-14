<?php

class Car {
	function MoveWheels {
		echo "Moving wheels"
	}
}

if(class_exists("Car")) {
	echo "Car is driving";
} else {
	echo "No car available";
}
