<?php

class Car
{
    public static $wheels = 4; // can use i any where, use it without having to new up an instance of Car
    public $hood = 'hood';

    public function MoveWheels()
    {
        self::$wheels = 10;
    }
}
$bmw = new Car();
Car::MoveWheels(); // call static data
echo Car::$wheels;
