<?php

namespace App\Http\Controllers\Api\InvestitsiyaSiyosati;

use App\Http\Controllers\Controller;
use App\Http\Requests\InternationalRelationsRequest;
use App\Http\Resources\InternationalRelationsResource;
use App\Models\InternationalRelations;
use Illuminate\Http\Request;

class InternationalRelationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return InternationalRelationsResource::collection(InternationalRelations::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InternationalRelationsRequest $request)
    {
        $relation=new InternationalRelations();
        $imageName = $request->logo->getClientOriginalName();
        $this->logo->storeAs('InternationalRelations', $imageName);
        $relation->logo=$imageName;
        $relation->webSayt=$request->webSayt;
        $relation->description=$request->description;
        $relation->save();
        return new InternationalRelationsResource($relation);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new InternationalRelationsResource(InternationalRelations::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(InternationalRelationsRequest $request, $id)
    {
        $relation=InternationalRelations::find($id);
        if ($this->newImage) {
            $imageName = $request->newImage->getClientOriginalName();
            $this->newImage->storeAs('InternationalRelations', $imageName);
            $relation->logo = $imageName;
        }
        $relation->webSayt=$request->webSayt;
        $relation->description=$request->description;
        $relation->update();
        return new InternationalRelationsResource($relation);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $relation=InternationalRelations::find($id);
        $relation->delete();
        return response()->json([
            'status'=>'Success',
            'message'=>'Deleted successfully'
        ]);
    }
}
