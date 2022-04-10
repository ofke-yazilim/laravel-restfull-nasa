<?php

namespace App\Http\Controllers\v1;

use App\Models\v1\Rover;
use App\Models\v1\State;
use Illuminate\Http\Request;

class RoverController extends Controller
{
    /**
     * @OA\Get(
     *      path="/rover",
     *      tags={"Rover"},
     *      summary="Get rover List.",
     *      operationId="getroverList",
     *      @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\MediaType(
     *            mediaType="application/json",
     *         )
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *         response=400,
     *         description="Bad Request"
     *      ),
     *      @OA\Response(
     *         response=500,
     *         description="Not successful operation"
     *      ),
     *      security={{"bearer_token":{}}},
     * )
     */
    public function index()
    {
        try{
            return response(Rover::all()->toArray(), 200);
        } catch (\Exception $e){
            return response(['message'=>'not success.'.$e->getMessage()], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * @OA\Post(
     *      path="/rover",
     *      tags={"Rover"},
     *      summary="Create Rover.",
     *      operationId="createRover",
     *      @OA\RequestBody(
     *         @OA\MediaType(
     *            mediaType="application/json",
     *            @OA\Schema(
     *               type="object",
     *               @OA\Property(property="name", type="string"),
     *               @OA\Property(property="plateau_id", type="integer"),
     *               @OA\Property(property="direction", type="string"),
     *               @OA\Property(property="x", type="integer"),
     *               @OA\Property(property="y", type="integer"),
     *               example={"name":"string","plateau_id":"integer","direction":"<N,S,W,E>","x":"integer","y":"integer"}
     *            )
     *        )
     *      ),
     *      @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\MediaType(
     *            mediaType="application/json",
     *         )
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *         response=400,
     *         description="Bad Request"
     *      ),
     *      @OA\Response(
     *         response=500,
     *         description="Not successful operation"
     *      ),
     *      security={{"bearer_token":{}}}
     * )
     */
    public function store(Request $request)
    {
        try{
            $data  = $request->json()->all();
            $rover = Rover::create($data);
            $state = State::create([
                'rover_id'        => $rover->id,
                'rover_direction' => $data['direction'],
                'rover_x'         => (int)$data['x'],
                'rover_y'         => (int)$data['y'],
                'rover_rotation'  => '-',
            ]);
            return response(['message'=>'success.','data'=>$rover], 200);
        } catch (\Exception $e){
            return response(['message'=>'not success.'.$e->getMessage()], 500);
        }
    }

    /**
     * @OA\Get(
     *      path="/rover/{id}",
     *      tags={"Rover"},
     *      summary="Show Rover.",
     *      operationId="showRover",
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\MediaType(
     *            mediaType="application/json",
     *         )
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *         response=400,
     *         description="Bad Request"
     *      ),
     *      @OA\Response(
     *         response=500,
     *         description="Not successful operation"
     *      ),
     *      security={{"bearer_token":{}}}
     * )
     */
    public function show($id)
    {
        try{
            return response(Rover::find($id)->toArray(), 200);
        } catch (\Exception $e){
            return response(['message'=>'not success.'.$e->getMessage()], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
