<?php

namespace App\Http\Controllers\v1;

use App\Models\v1\Plateau;
use Illuminate\Http\Request;

class PlateauController extends Controller
{
    /**
     * @OA\Get(
     *      path="/plateau",
     *      tags={"Plateau"},
     *      summary="Get Plateau List.",
     *      operationId="getPlateauList",
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

    /**
     * @OA\Post(
     *      path="/plateau",
     *      tags={"Plateau"},
     *      summary="Create Plateau.",
     *      operationId="createPlateau",
     *      @OA\RequestBody(
     *         @OA\MediaType(
     *            mediaType="application/json",
     *            @OA\Schema(
     *               type="object",
     *               @OA\Property(property="name", type="string"),
     *               example={"name": "string"}
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
            $data    = $request->json()->all();
            $plateau = Plateau::create($data);
            return response(['message'=>'success.','data'=>$plateau], 200);
        } catch (\Exception $e){
            return response(['message'=>'not success.'.$e->getMessage()], 500);
        }
    }

    /**
     * @OA\Get(
     *      path="/plateau/{id}",
     *      tags={"Plateau"},
     *      summary="Show Plateau.",
     *      operationId="showPlateau",
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
