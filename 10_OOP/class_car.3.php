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

$bmw = new Car();

$truck = new Car();
$truck->createDoors();

echo $bmw->wheels.'<br>';
echo $truck->wheels = 10;
echo $truck->doors;
