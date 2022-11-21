<?php

class Car
{
    public $name;
    public $color;

    function __construct($name, $color)
    {
        $this->name = $name;
        $this->color = $color;
    }

    function get_name()
    {
        return $this->name;
    }

    function get_color()
    {
        return $this->color;
    }
}

$volvo = new Car("Volvo", "Red");

echo $volvo->get_color() . "\n";
echo $volvo->get_name() . "\n";

echo "<br>";


$Toyota = new Car(" Toyota", "Black");

echo $Toyota->get_color();
echo $Toyota->get_name();

