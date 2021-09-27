<?php
namespace App\MarsRovers;

class Position{
    private $x;
    private $y;
    private $f;//facing pointer
    public function __construct($x, $y, $f) {
        $this->x = $x;
        $this->y = $y;
        $this->f = $f;
    }

    /**
     * Get the value of x
     */ 
    public function getX()
    {
        return $this->x;
    }

    /**
     * Set the value of x
     */ 
    public function setX($x)
    {
        $this->x = $x;

        return $this;
    }

    /**
     * Get the value of y
     */ 
    public function getY()
    {
        return $this->y;
    }

    /**
     * Set the value of y
     */ 
    public function setY($y)
    {
        $this->y = $y;
    }

    /**
     * Get the value of f
     */ 
    public function getF()
    {
        return $this->f;
    }

    /**
     * Set the value of f
     */ 
    public function setF($f)
    {
        $this->f = $f;
    }
    /**
     * Get to array variable
     */
    public function toArray()
    {
        return [
            'x'=>$this->getX(),
            'y'=>$this->getY(),
            'f'=>$this->getF()
        ];
    }
}