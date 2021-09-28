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
/**
 * @OA\Schema(
 *     title="PlateauController",
 *     description="PlateauController",
 *     @OA\Xml(
 *         name="PlateauController"
 *     )
 * )
 */
class PlateauController extends Controller
    {
    /**
     * @OA\Post(
     *      path="/api/v1/plateau/create",
     *      operationId="storePlateau",
     *      tags={"storePlateau"},
     *      summary="Store new Plateau",
     *      description="Api's store plateua and return to response saved data",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\MediaType(
     *              mediaType="multipart/form-data",
     *              @OA\Schema(
     *                  @OA\Property(
     *                      property="x",
     *                      type="integer"
     *                  ),
     *                  @OA\Property(
     *                      property="y",
     *                      type="integer"
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
    
    /**
     * @OA\Get(
     *      path="/api/v1/plateua/get",
     *      operationId="getPlateuaLast",
     *      tags={"PlateuaLast"},
     *      summary="Get PlateuaLast information",
     *      description="Returns PlateuaLast data",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/ResponseManipulator")
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     * )
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
/**
 * @OA\Schema(
 *  schema="PlateuCreate",
 *  title="Plateu create schema for using references",
 * 	@OA\Property(
 * 		property="x",
 * 		type="integer"
 * 	),
 * 	@OA\Property(
 * 		property="y",
 * 		type="integer"
 * 	)
 * )
 */