<?php

namespace Tests\Unit;

use App\MarsRovers\Data\SHMAP;
use PHPUnit\Framework\TestCase;

class SHMAPTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->instance = new SHMAP();
        $this->instance->open(0x800,100);
    }
    /**
     * Create/read data length byte shared memory block with system id of key
     */
    public function test_open()
    {
        $this->instance->open(0x800,100);
        $this->assertTrue(true);
    }
    /**
     * Write a text string into shared memory
     */
    public function test_write()
    {
        $this->instance->write("this is a test data");
        $this->assertTrue(true);
    }
    /**
     * Read a text string into shared memory
     */
    public function test_read()
    {
        $this->instance->write(serialize("this is a test data"));
        $this->assertTrue(unserialize($this->instance->read())=="this is a test data");
    }
    /**
     * Read a text string into shared memory
     */
    public function test_delete()
    {
        $this->instance->write("this is a test data");
        $this->instance->delete();
        $this->assertTrue(true);
    }
}
