<?php

namespace Tests\Unit;

use App\MarsRovers\Data\Recorder;
use App\MarsRovers\Plateau;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPUnit\Framework\assertTrue;

class FakeRecord extends Recorder
{
    public static $address = 0x800;
    public static $maxLength = 1000;
    public $myData= "test1"; 
    public function __construct() {
        parent::__construct(self::$address,self::$maxLength);
    }

}


class RecorderTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->instance = new FakeRecord();
    }
    /**
     * A test_checkInPoint1 feature test point in plateau.
     *
     * @return void
     */
    public function test_save()
    {
        $this->instance->save();
        assertTrue(true);
    }
    /**
     * A test_checkInPoint1 feature test point in plateau.
     *
     * @return void
     */
    public function test_get()
    {
        assertTrue($this->instance->get()->myData=="test1");
    }
}
