<?php

class Car
{
    public $wheels = 4;  // available to whole programme
    protected $hood = 'hood'; // available to this class and any class that extends this class. subclasses.
    private $engine = 'vrrroooomvrooom'; // available only to this class
    public $doors = 4;

    public function MoveWheels()
    {
        $this->wheels = 10;
    }
}

$bmw = new Car();
// echo $bmw->showProperty();

class SnowVehicle extends Car
{
    public function showProperty()
    {
        echo $this->engine;
    }
}

$snowCar = new SnowVehicle();
echo $snowCar->wheels;
