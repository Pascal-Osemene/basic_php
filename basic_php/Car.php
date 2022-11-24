<?php

class Car
{
    public $name;
    public $color;
    const MESSAGE = 'na you know';
    

    function __construct($name, $color)
    {
        $this->name = $name;
        $this->color = $color;
      

    }

    public function get_name()
    {
        return $this->name;
    }

    private function get_color()
    {
        return $this->color;
    }

    public function show_color()
    {
        return $this->color;
    }
}

// $benz = new Car("Mercedes Benz", "cream");

// echo 'The name of my favorite car is: '. $benz->get_name(). ' and i love it to be in '. $benz->show_color(). ' color';


class Benz extends Car
{
    public $model;
    function __construct($name, $color, $model)
    {
        $this->name = $name;
        $this->color = $color;
        $this->model = $model;
    }

    public function print_color()
    {
        return $this->show_color();

    }

    public function get_model()
{
    return $this->model;

}

}

echo Benz::MESSAGE;

$benz = new Benz('Mercedes', 'Red', '2022');

echo $benz->print_color();

$benz->model = '2021';

echo $benz->get_model();





// $volvo = new Car("Volvo", "Red");

// echo $volvo->get_color() . "\n";
// echo $volvo->get_name() . "\n";

// echo "<br>";


// $Toyota = new Car(" Toyota", "Black");

// echo $Toyota->get_color();
// echo $Toyota->get_name();
