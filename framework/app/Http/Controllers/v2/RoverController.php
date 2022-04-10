<?php

namespace App\Http\Controllers\v2;

use App\Models\v2\Rover;
use App\Models\v2\State;
use Illuminate\Http\Request;

class RoverController extends Controller
{
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
