<?php
namespace App\MarsRovers\CommandsAdapter;

use App\MarsRovers\CommandsAdapter\Commands;
use Exception;

use function PHPUnit\Framework\throwException;

class CommandsNasa implements Commands{
    public function decode(string $var)
    {
        $cmdStack = [];
        $cmdArr = str_split($var);
        foreach ($cmdArr as $cmd) {
            switch ($cmd) {
                case 'L':
                    array_push($cmdStack,'turnLeft');
                    break;
                case 'R':
                    array_push($cmdStack,'turnRight');
                    break;
                case 'M':
                    array_push($cmdStack,'move');
                    break;
                default:
                    throw new Exception('Command('.$cmd.') is invalid!');
                    break;
            }
        }
        return $cmdStack;        
    }
}