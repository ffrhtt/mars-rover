<?php
namespace App\MarsRovers;

class Size{
    private $x;
    private $y;
    public function __construct($x, $y) {
        $this->x = $x;
        $this->y = $y;
    }

    /**
     * Get the value of x
     */ 
    public function getX()
    {
        return $this->x;
    }


    /**
     * Get the value of y
     */ 
    public function getY()
    {
        return $this->y;
    }

}