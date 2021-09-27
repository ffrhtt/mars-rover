<?php

namespace App\Http\Controllers\V1;

use App\Http\Response\ResponseManipulator;
use Illuminate\Http\Request;

class Response extends ResponseManipulator
{
    public function __construct() {
        parent::__construct();
        parent::setHeading([
            "api"       =>"MarsRover",
            "version"   =>"1.0"
        ]);
    }
}
