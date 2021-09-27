<?php
namespace App\MarsRovers;

use App\MarsRovers\Data\Recorder;
use App\MarsRovers\Size;
use App\MarsRovers\Position;
use Exception;

class Plateau extends Recorder{
    protected $size;
    /**
     * Memory Adress
     */
    public static $address=0x100;
    /**
     * Memory Alocate Byte Length for save
     */
    public static $maxLength=1000;

    public function __construct(Size $size = null) {
        $this->size = $size;
        parent::__construct(self::$address,self::$maxLength);
    }

    /**
     * Checking to the point within the region range
     *
     * @return  boolean
     */ 
    public function checkInPoint(Position $position)
    {
        if ($position->getX()<0 || $position->getY()<0) {
            return false;
        }
        if ($position->getX() > $this->size->getX() || $position->getY() > $this->size->getY()) {
            return false;
        }
        return true;
    }

    /**
     * Get to array variable
     */
    public function toArray()
    {
        return [
            'name'=>'plateau',
            'size'=>[
                'x'=>$this->size->getX(),
                'y'=>$this->size->getY()
            ]
        ];
    }
    

    /**
     * Get the value of size
     */ 
    public function getSize()
    {
        return $this->size;
    }
    /**
     * json data will be fill to this object
     */
    public function fill($jsonData)
    {
        if (!$jsonData) {
            throw new Exception('Plateu not created, please before define a Plateu');
        }
        dd($jsonData);
        $size = new Size($jsonData->size->x,$jsonData->size->y);
        return new Plateau($size);
        
    }
    public static function getLast()
    {
        return new Recorder(self::$address,self::$maxLength);
    }

}