<?php

namespace App\Http\Controllers\Api\JamiyatHaqida;

use App\Http\Controllers\Controller;
use App\Http\Requests\MissiyaRequest;
use App\Http\Resources\IesAjResource;
use App\Http\Resources\MissiyaResource;
use App\Models\IesAj;
use App\Models\Missiya;
use Illuminate\Http\Request;

class MissiyaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return MissiyaResource::collection(Missiya::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MissiyaRequest $request)
    {
        $missiya=new Missiya();
        $missiya->title=$request->title;
        $missiya->description=$request->description;
        $imagesName='';
        foreach ($request->images as $image)
        {

            $imgName = $image->getClientOriginalName();
            $image->storeAs('Missiya', $imgName);
            $imagesName = $imagesName . ',' . $imgName;
        }
        $missiya->file=$request->file;
        $missiya->save();
        return new MissiyaResource($missiya);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new MissiyaResource(Missiya::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MissiyaRequest $request, $id)
    {
        $missiya=Missiya::find($id);
        $missiya->title=$request->title;
        $missiya->description=$request->description;
        if ($request->newImages) {
            $imagesName = '';
            foreach ($request->newImages as $image) {

                $imgName = $image->getClientOriginalName();
                $image->storeAs('Missiya', $imgName);
                $imagesName = $imagesName . ',' . $imgName;
            }
        }
        $missiya->file=$request->file;
        $missiya->save();
        return new MissiyaResource($missiya);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $missiya=Missiya::find($id);
        $missiya->delete();
        return response()->json([
            'status'=>'Success',
            'message'=>'Deleted successfully'
        ]);
    }
}
