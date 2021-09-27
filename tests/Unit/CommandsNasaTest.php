<?php

namespace Tests\Unit;

use App\MarsRovers\CommandsAdapter\Commands;
use App\MarsRovers\CommandsAdapter\CommandsNasa;
use PHPUnit\Framework\TestCase;

class CommandsNasaTest extends TestCase
{
    protected $command;
    public function setUp(): void
    {
        parent::setUp();
        $this->command = new CommandsNasa();
    }
    /**
     * A CommandsNasaTest unit test example.
     *
     * @return void
     */
    public function test_decode1()
    {
        $input = "LRM";
        $expected = ["turnLeft","turnRight","move"];
        $this->assertTrue($expected==$this->command->decode($input));
    }
    /**
     * A CommandsNasaTest unit test example.
     *
     * @return void
     */
    public function test_decode2()
    {
        $input = "LRMMLLLRLMR";
        $expected = ["turnLeft","turnRight","move","move","turnLeft","turnLeft","turnLeft","turnRight","turnLeft","move","turnRight"];
        $this->assertTrue($expected==$this->command->decode($input));
    }
}
