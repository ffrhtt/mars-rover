<?php
namespace App\MarsRovers\Data;

use App\MarsRovers\Data\SHMAP;

/**
 * Shared memory for objects
 */
class Recorder{
    public $shmap;
    public function __construct($address,$maxLength)
    {
        $this->shmap = new SHMAP();
        $this->shmap->open($address,$maxLength);
    }
    public function save()
    {
        //$this->shmap->write(json_encode($this->obj->toArray()));
        //dd(serialize($this));
        $this->shmap->write(serialize($this));
    }
    public function get(){
        //dd($this->shmap->read());
        return unserialize($this->shmap->read());
        //return json_decode(preg_replace('/[\x00-\x09\x0B\x0C\x0E-\x1F\x7F]/', '', $this->shmap->read()));
    }
}