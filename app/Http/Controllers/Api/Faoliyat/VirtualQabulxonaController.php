<?php

namespace App\Http\Controllers\Api\Faoliyat;

use App\Http\Controllers\Controller;
use App\Http\Requests\VirtualQabulxonaRequest;
use App\Http\Resources\VirtualQabulxonaResource;
use App\Models\VertualQabulxona;
use Illuminate\Http\Request;

class VirtualQabulxonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return VirtualQabulxonaResource::collection(VertualQabulxona::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VirtualQabulxonaRequest $request)
    {
        return new VirtualQabulxonaResource(VertualQabulxona::create($request->validated()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new VirtualQabulxonaResource(VertualQabulxona::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VirtualQabulxonaRequest $request, $id)
    {
        $vertual=VertualQabulxona::find($id);
        $vertual->update($request->validated());
        return new VirtualQabulxonaResource($vertual);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vertual=VertualQabulxona::find($id);
        $vertual->delete();
        return response()->json([
            'status'=>'Success',
            'message'=>'Deleted successfully'
        ]);
    }
}
