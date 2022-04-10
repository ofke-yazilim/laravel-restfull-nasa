<?php

namespace App\Http\Controllers\v2;

use App\Models\v2\Plateau;
use Illuminate\Http\Request;

class PlateauController extends Controller
{
    public function index()
    {
        try{
            return response(Plateau::all()->toArray(), 200);
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
            $data    = $request->json()->all();
            $plateau = Plateau::create($data);
            return response(['message'=>'success.','data'=>$plateau], 200);
        } catch (\Exception $e){
            return response(['message'=>'not success.'.$e->getMessage()], 500);
        }
    }


    public function show($id)
    {
        try{
            return response(Plateau::find($id)->toArray(), 200);
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
