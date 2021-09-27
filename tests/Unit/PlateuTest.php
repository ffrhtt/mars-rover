<?php

namespace Tests\Unit;

use App\MarsRovers\Plateau;
use App\MarsRovers\Position;
use App\MarsRovers\Size;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPUnit\Framework\assertTrue;

class PlateuTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->instance = new Plateau(new Size(30,40));
    }
    /**
     * A test_checkInPoint1 feature test point in plateau.
     *
     * @return void
     */
    public function test_checkInPoint1()
    {
        $point = new Position(10,12,'N');
        assertTrue($this->instance->checkInPoint($point));
    }
    /**
     * A test_checkInPoint2 feature test point in plateau.
     *
     * @return void
     */
    public function test_checkInPoint2()
    {
        $point = new Position(31,40,'N');
        assertTrue(!$this->instance->checkInPoint($point));
    }
    /**
     * A test_checkInPoint2 feature test point in plateau.
     *
     * @return void
     */
    public function test_checkInPoint3()
    {
        $point = new Position(30,40,'N');
        assertTrue($this->instance->checkInPoint($point));
    }
    /**
     * A test_checkInPoint2 feature test point in plateau.
     *
     * @return void
     */
    public function test_checkInPoint4()
    {
        $point = new Position(0,0,'N');
        assertTrue($this->instance->checkInPoint($point));
    }
    /**
     * A test_checkInPoint2 feature test point in plateau.
     *
     * @return void
     */
    public function test_checkInPoint5()
    {
        $point = new Position(-1,0,'N');
        assertTrue(!$this->instance->checkInPoint($point));
    }
    /**
     * A test_checkInPoint2 feature test point in plateau.
     *
     * @return void
     */
    public function test_checkInPoint6()
    {
        $point = new Position(30,41,'N');
        assertTrue(!$this->instance->checkInPoint($point));
    }
}
