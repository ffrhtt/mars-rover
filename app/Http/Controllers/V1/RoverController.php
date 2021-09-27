<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\MarsRovers\CommandsAdapter\CommandsNasa;
use App\MarsRovers\Data\Recorder;
use App\MarsRovers\Plateau;
use App\MarsRovers\Position;
use App\MarsRovers\Rover;
use Exception;
use Illuminate\Http\Request;

class RoverController extends Controller
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
            
            $position = new Position($request->x,$request->y,$request->f);
            $plateue = (new PlateauController())->getPlateuObj();
            if (!$plateue->getSize()) {
                throw new Exception('plateu->size variable not defined');
            }
            $rover = new Rover($position);
            $rover->setPlateau($plateue);
            $rover->save();

            $resp->success($rover->toArray());
        } catch (Exception $th) {
            $resp->error($th);
        }
        return $resp->toJson();
    }
    /**
     * Send command to rover
     *
     * @return \Illuminate\Http\Response
     */
    public function sendComand(Request $request)
    {
        $resp = new Response();//Response will managing with this class all
        try {
            $rover = $this->getRoverObj();
            $rover->recorderMatch();
            $command = (new CommandsNasa())->decode($request->commands);
            $oldPosition = $rover->position->toArray();//keep old position
            $rover->run($command);//execute commands
            $newPosition = $rover->position->toArray();//get new position
            $rover->save();//save to changes on memory 
            $resp->success([
                "rover"=>$rover->toArray(),
                "oldPosition"=>$oldPosition,
                "newPosition"=>$newPosition
            ]);
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
        try {
            $resp->success($this->getRoverObj()->toArray());
        } catch (\Throwable $th) {
            //throw $th;
        }
        return $resp->toJson();
    }
    /**
     * Display rover state
     *
     * @return \Illuminate\Http\Response
     */
    public function getState()
    {
        $resp = new Response();
        try {
            $rover = $this->getRoverObj();
            $resp->success($rover->getPosition()->toArray());
        } catch (\Throwable $th) {
            //throw $th;
        }
        return $resp->toJson();
    }
    /**
     * get plateu object from memory
     */
    public function getRoverObj()
    {
        return (new Recorder(Rover::$address,Rover::$maxLength))->get();
    }
    
}
