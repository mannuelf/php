<?php

class Car
{
    public $wheels = 4;
    public $hood = 1;
    public $engine = 1;
    public $doors = 4;

    public function MoveWheels()
    {
        $this->wheels = 10;
    }

    // have methods change properties
    public function createDoors()
    {
        $this->doors = 6;
    }
}

class Plane extends Car
{
    public $wheels = 20;
}

$bmw = new Car();

$jet = new Plane();

echo $jet->wheels;

// if (class_exists("Plane")) {
// 	echo "plane exists";
// }
