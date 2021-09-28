<?php

namespace Tests\Unit;

use App\MarsRovers\CommandsAdapter\CommandsNasa;
use App\MarsRovers\Plateau;
use App\MarsRovers\Position;
use App\MarsRovers\Rover;
use App\MarsRovers\Size;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPUnit\Framework\assertEquals;

class RoverTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_rotate()
    {
        $expectedPosition = new Position(10,10,'W');
        $initialPositon = new Position(10,10,'N');
        $rover = new Rover($initialPositon);
        $nasaCommands = 'L';
        $decoder = new CommandsNasa();
        $rover->run($decoder->decode($nasaCommands));
        assertEquals($expectedPosition,$rover->getPosition());
    }
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_rotate2()
    {
        $expectedPosition = new Position(10,10,'W');
        $initialPositon = new Position(10,10,'E');
        $rover = new Rover($initialPositon);
        $nasaCommands = 'LL';
        $decoder = new CommandsNasa();
        $rover->run($decoder->decode($nasaCommands));
        assertEquals($expectedPosition,$rover->getPosition());
    }
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_rotate3()
    {
        $expectedPosition = new Position(10,10,'S');
        $initialPositon = new Position(10,10,'E');
        $rover = new Rover($initialPositon);
        $nasaCommands = 'LLL';
        $decoder = new CommandsNasa();
        $rover->run($decoder->decode($nasaCommands));
        assertEquals($expectedPosition,$rover->getPosition());
    }
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_rotate4()
    {
        $expectedPosition = new Position(10,10,'E');
        $initialPositon = new Position(10,10,'E');
        $rover = new Rover($initialPositon);
        $nasaCommands = 'LLLLRRRR';
        $decoder = new CommandsNasa();
        $rover->run($decoder->decode($nasaCommands));
        assertEquals($expectedPosition,$rover->getPosition());
    }
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_move()
    {
        $expectedPosition = new Position(2,0,'E');
        $initialPositon = new Position(0,0,'E');

        $plateu = new Plateau(new Size(20,20));
        $rover = new Rover($initialPositon);
        $rover->setPlateau($plateu);
        $nasaCommands = 'MM';
        $decoder = new CommandsNasa();
        $rover->run($decoder->decode($nasaCommands));
        assertEquals($expectedPosition,$rover->getPosition());
    }
    /**
     * A basic feature test run.
     *
     * @return void
     */
    public function test_run()
    {
        $expectedPosition = new Position(10,8,'W');

        $plateu = new Plateau(new Size(10,20));
        $initialPositon = new Position(0,0,'N');
        $rover = new Rover($initialPositon,$plateu);
        $nasaCommands = 'MMMMMMMMRMMMMMMMMMMLL';
        $decoder = new CommandsNasa();
        $rover->run($decoder->decode($nasaCommands));
        assertEquals($expectedPosition,$rover->getPosition());
    }
    /**
     * A basic feature test get axis line.
     *
     * @return void
     */
    public function test_get_axis()
    {
        $expectedAxis = 'x';

        $plateu = new Plateau(new Size(10,20));
        $initialPositon = new Position(0,0,'N');
        $rover = new Rover($initialPositon,$plateu);
        $rover->turnLeft();
        assertEquals($expectedAxis,$rover->getAxis());
    }
    /**
     * A basic feature test axis line 2.
     *
     * @return void
     */
    public function test_get_axis2()
    {
        $expectedAxis = 'y';

        $plateu = new Plateau(new Size(10,20));
        $initialPositon = new Position(0,0,'N');
        $rover = new Rover($initialPositon,$plateu);
        $rover->turnLeft();
        $rover->turnLeft();
        assertEquals($expectedAxis,$rover->getAxis());
    }
    /**
     * A basic feature test move 2.
     *
     * @return void
     */
    public function test_move2()
    {
        $expectedPosition = new Position(-1,1,'W');
        $initialPositon = new Position(0,0,'N');

        $plateu = new Plateau(new Size(10,20));
        $rover = new Rover($initialPositon,$plateu);
        $rover->move();
        $rover->turnLeft();
        $rover->move();
        assertEquals($expectedPosition,$rover->getPosition());
    }
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_movement_delta()
    {
        $expected = 1;
        $initialPositon = new Position(0,0,'N');

        $plateu = new Plateau(new Size(10,20));
        $rover = new Rover($initialPositon,$plateu);
        assertEquals($expected,$rover->getMovementDelta());
    }
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_movement_delta2()
    {
        $expected = -1;
        $initialPositon = new Position(0,0,'N');

        $plateu = new Plateau(new Size(10,20));
        $rover = new Rover($initialPositon,$plateu);
        $rover->turnLeft();
        assertEquals($expected,$rover->getMovementDelta());
    }
}
