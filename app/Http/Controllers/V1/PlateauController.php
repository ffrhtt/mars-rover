<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\MarsRovers\Data\Recorder;
use App\MarsRovers\Plateau;
use App\MarsRovers\Size;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;

class PlateauController extends Controller
{
    
    /**
     * Create data of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $resp = new Response();//Response will managing with this class all
        try {
            $size = new Size($request->x,$request->y);
            $plateue = new Plateau($size);
            $plateue->save();//Saved on memory
            $resp->success($plateue->toArray());
        } catch (Exception $th) {
            $resp->error($th);
        }
        return $resp->toJson();
    }
    /**
     * Display last rover of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get()
    {
        $resp = new Response();
        $resp->success($this->getPlateuObj()->toArray());
        return $resp->toJson();
    }
    /**
     * get plateu object from memory
     */
    public function getPlateuObj()
    {
        return (new Recorder(Plateau::$address,Plateau::$maxLength))->get();
    }
}
