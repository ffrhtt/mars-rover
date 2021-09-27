<?php 
namespace App\MarsRovers\CommandsAdapter;

use App\MarsRovers\Rover;

interface Commands {
    public function decode(String $var);

}