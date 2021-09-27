<?php
namespace App\MarsRovers;

use App\MarsRovers\Data\Recorder;
use App\MarsRovers\Plateau;
class Rover extends Recorder{
    private $id="200";
    /**
     * Memory Adress
     */
    public static $address=0xff9;
    /**
     * Memory Alocate Byte Length for save
     */
    public static $maxLength=1000;
    protected $plateau;
    public $position;
    protected $FACE_CONSTANTS=['N','E','S','W'];

    public function __construct(Position $position) {
        $this->position = $position;
        $this->recorderMatch();
    }
    public function recorderMatch()
    {
        parent::__construct(self::$address,self::$maxLength);
    }
    /**
     * face contants pointer move from to rotate, 
     * +1--> move to right facing pointer from FACE_CONSTANTS,
     * -1--> move to left facing pointer from FACE_CONSTANTS
     */
    public function rotate($pointer)
    {
        $currentIndex=array_search($this->position->getF(),$this->FACE_CONSTANTS);
        $currentIndex += $pointer;
        $currentIndex = ($currentIndex<0)?($currentIndex+4):$currentIndex;
        $this->position->setF($this->FACE_CONSTANTS[$currentIndex%4]);
    }

    /**
     * increase to x,y value depended axis 
     */
    public function move()
    {
        if ($this->getAxis() == 'x') 
            $this->position->setX($this->position->getX()+1);
        else
            $this->position->setY($this->position->getY()+1);
    }
    /**
     * Get to current axis from facing
     * @return of 'x' or 'y'
     */
    public function getAxis()
    {
        return in_array($this->position->getF(),['N','S'])?'y':'x';
    }
    /**
     * Turn the facing +90 degree left
     */ 
    public function turnLeft()
    {
        $this->rotate(-1);
    }
    /**
     * Turn the facing +90 degree right
     */ 
    public function turnRight()
    {
        $this->rotate(+1);
    }
    
    /**
     * Get the value of position
     */ 
    public function getPosition()
    {
        return $this->position;
    }
    /**
     * Run rover functions from App\CommandsAdapter\Commands
     */ 
    public function run(array $commands)
    {
        foreach ($commands as $value) {
            $this->{$value}();
        }
        return $this;
    }


    /**
     * Get the value of plateau
     */ 
    public function getPlateau()
    {
        return $this->plateau;
    }

    /**
     * Set the value of plateau
     *
     * @return  self
     */ 
    public function setPlateau($plateau)
    {
        $this->plateau = $plateau;

        return $this;
    }
    
    /**
     * Get to array variable
     */
    public function toArray()
    {
        return [
            'id'=>$this->getId(),
            'plateau'=>$this->plateau?$this->plateau->toArray():null,
            'position'=>$this->position?$this->position->toArray():null
        ];
    }
    /**
     * convert data from storage to the object
    */
    /*
    public function jsonToObject($jsonData)
    {
        $position = new Position($jsonData->position->x,$jsonData->position->y,$jsonData->position->f);
        $plateau = new Plateau($jsonData->plateau->size->x,$jsonData->plateau->size->y);
        $instance = new Rover($position);
        $instance->setPlateau($plateau);
        return $instance;        
    }
    */

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}