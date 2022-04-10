<?php

namespace App\Http\Controllers\v1;

use App\Models\v1\State;
use Illuminate\Http\Request;

class StateController extends Controller
{
    private $directions      = ['E','S','W','N'];
    private $move_directions = ['E' => '+x','S' => '-y','W' => '-x','N' => '+y'];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     *      path="/state",
     *      tags={"State"},
     *      summary="Create State.",
     *      operationId="createState",
     *      @OA\RequestBody(
     *         @OA\MediaType(
     *            mediaType="application/json",
     *            @OA\Schema(
     *               type="object",
     *               @OA\Property(property="number_of_progress", type="integer"),
     *               @OA\Property(property="rover_id", type="integer"),
     *               @OA\Property(property="rover_rotation", type="string"),
     *               example={"number_of_progress": "Düzlemde ilerleme miktarı (integer)","rover_id": "integer","rover_rotation": "<R,L>"}
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

            $last_state           = State::where('rover_id',$data['rover_id'])->latest()->first();

            if(!$last_state){
                return response(['message'=>"The record couldn't found."], 400);
            }

            if((int)$data['number_of_progress']<0){
                return response(['message'=>"The movement amount couldn't be small of zero."], 400);
            }

            //var_dump($last_state->toArray());exit;
            $last_direction       = $last_state->rover_direction;
            $last_direction_index = array_keys($this->directions, $last_direction)[0];

            $last_rover_x         = $last_state['rover_x'];
            $last_rover_y         = $last_state['rover_y'];

            $new_direction        = $last_direction;
            if(isset($data['rover_rotation'])){
                if($data['rover_rotation']){
                    if($data['rover_rotation'] == "R"){
                        $new_direction_index = (int)$last_direction_index+1;
                        if($new_direction_index == 4){
                            $new_direction_index = 0;
                        }
                        $new_direction = $this->directions[$new_direction_index];
                    } elseif ($data['rover_rotation'] == "L"){
                        $new_direction_index = (int)$last_direction_index - 1;
                        if($new_direction_index < 0){
                            $new_direction_index = 3;
                        }
                        $new_direction = $this->directions[$new_direction_index];
                    }
                }
            }

            $moved_x     = 0;
            $moved_y     = 0;
            $new_rover_x = $last_rover_x;
            $new_rover_y = $last_rover_y;
            if($data['number_of_progress']>0){
                if($this->move_directions[$new_direction] == "+x"){
                    $new_rover_x = $last_rover_x + $data['number_of_progress'];
                    $moved_x     = $data['number_of_progress'];
                }

                if($this->move_directions[$new_direction] == "-x"){
                    $new_rover_x = $last_rover_x - $data['number_of_progress'];
                    $moved_x     = $data['number_of_progress']*-1;
                }

                if($this->move_directions[$new_direction] == "+y"){
                    $new_rover_y = $last_rover_y + $data['number_of_progress'];
                    $moved_y     = $data['number_of_progress'];
                }

                if($this->move_directions[$new_direction] == "-y"){
                    $new_rover_y = $last_rover_y - $data['number_of_progress'];
                    $moved_y     = $data['number_of_progress']*-1;
                }
            }

            $state = State::create([
                'rover_id'        => $last_state['rover_id'],
                'rover_direction' => $new_direction,
                'rover_x'         => $new_rover_x,
                'rover_y'         => $new_rover_y,
                'rover_rotation'  => $data['rover_rotation']??'M',
                'moved_x'         => $moved_x,
                'moved_y'         => $moved_y,
            ]);

            return response(['message'=>'success.','data'=>$state], 200);
        } catch (\Exception $e){
            return response(['message'=>'not success.'.$e->getMessage()." - ".$e->getLine()], 500);
        }
    }

    /**
     * @OA\Get(
     *      path="/rover/state/{rover_id}",
     *      tags={"State"},
     *      summary="Show Rover State.",
     *      operationId="showRoverState",
     *      @OA\Parameter(
     *          name="rover_id",
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
    public function state($rover_id)
    {
        try{
            $last_state           = State::where('rover_id',$rover_id)->latest()->first();
            return response(['direction'=>$last_state->rover_direction,'x' => $last_state->rover_x,'y'=>$last_state->rover_y], 200);
        } catch (\Exception $e){
            return response(['message'=>'not success.'.$e->getMessage()], 500);
        }
    }

    /**
     * Show the state
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
