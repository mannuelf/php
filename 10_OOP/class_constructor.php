<?php

class Car
{
    public $wheels = 4;
    public $hood = 1;
    public $engine = 1;
    public $doors = 4;

    public function __construct()
    {
        echo $this->wheels = 10;
    }
}

$mercedes = new Car();
$truck = new Car();
$bmw = new Car();
