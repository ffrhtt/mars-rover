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

/**
 * @OA\Schema(
 *     title="RoverController",
 *     description="Rover remote controlling api",
 *     @OA\Xml(
 *         name="RoverController"
 *     )
 * )
 */
class RoverController extends Controller
{
    
    /**
     * @OA\Post(
     *      path="/api/v1/rover/create",
     *      operationId="roverPlateau",
     *      tags={"roverPlateau"},
     *      summary="Store new Rover",
     *      description="Api's define a rover and assign to plateau which on memory  ",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\MediaType(
     *              mediaType="multipart/form-data",
     *              @OA\Schema(
     *                  description="Rover position variables",
     *                  @OA\Property(
     *                      property="x",
     *                      type="integer",
     *                      description="x axis position on the defined memory plateau",
     *                  ),
     *                  @OA\Property(
     *                      property="y",
     *                      type="integer",
     *                      description="y axis position on the defined memory plateau",
     *                  ),
     *                  @OA\Property(
     *                      property="f",
     *                      type="string",
     *                      description="Rover heading variable like N,E,S,W",
     *                      example="N"
     *                  ),
     *              ),
     *          ),
     *      ),
     *      @OA\Response(
     *        response=200,
     *        description="OK",
     *        @OA\JsonContent(ref="#/components/schemas/ResponseManipulator")
     *      )
    * )
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
     * @OA\Post(
     *      path="/api/v1/rover/send/command",
     *      operationId="roverSendCommand",
     *      tags={"roverSendCommand"},
     *      summary="Control the rover",
     *      description="Api control the rover on the plateau.",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\MediaType(
     *              mediaType="multipart/form-data",
     *              @OA\Schema(
     *                  description="Rover Nasa Command Variables",
     *                  @OA\Property(
     *                      property="commands",
     *                      type="string",
     *                      description="Rover move variable batch like L,R,M. L:Turn 90 degree to Left,R:Turn 90 degree to Right,M: go to 1 unit on plateau ",
     *                      example="MMMRMMML"
     *                  ),
     *              ),
     *          ),
     *      ),
     *      @OA\Response(
     *        response=200,
     *        description="OK",
     *        @OA\JsonContent(ref="#/components/schemas/ResponseManipulator")
     *      )
    * )
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
                "newPosition"=>$newPosition,
                "roverInArea"=>$rover->getPlateau()->checkInPoint($rover->getPosition())
            ]);
        } catch (Exception $th) {
            $resp->error($th);
        }
        return $resp->toJson();
    }

    /**
     * @OA\Get(
     *      path="/api/v1/rover/get",
     *      operationId="roverGet",
     *      tags={"roverGet"},
     *      summary="Get the rover",
     *      description="get rover info.",
     *      @OA\Response(
     *        response=200,
     *        description="OK",
     *        @OA\JsonContent(ref="#/components/schemas/ResponseManipulator")
     *      )
    * )
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
     * @OA\Get(
     *      path="/api/v1/rover/get/state",
     *      operationId="roverGetState",
     *      tags={"roverGetState"},
     *      summary="Get the rover state",
     *      description="get rover info.",
     *      @OA\Response(
     *        response=200,
     *        description="OK",
     *        @OA\JsonContent(ref="#/components/schemas/ResponseManipulator")
     *      )
    * )
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
