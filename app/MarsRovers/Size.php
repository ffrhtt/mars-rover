<?php
namespace App\MarsRovers;

/**
 * @OA\Schema(
 *     title="Size",
 *     description="MarsRover Size Body Data",
 *     @OA\Xml(
 *         name="MarsRover"
 *     ),
 *     required={"x","y"}
 * )
 */
class Size{
    
    /**
     * @OA\Property(
     *     title="X",
     *     description="X axis length",
     *     format="int64",
     *     example=10
     * )
     *
     * @var integer
     */
    private $x;
    
    /**
     * @OA\Property(
     *     title="Y",
     *     description="Y axis length",
     *     format="int64",
     *     example=12
     * )
     *
     * @var integer
     */
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