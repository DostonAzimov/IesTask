<?php

namespace App\Http\Controllers\Api\JamiyatHaqida;

use App\Http\Controllers\Controller;
use App\Http\Requests\TransformaciyaRequest;
use App\Http\Resources\IesAjResource;
use App\Http\Resources\TransformaciyaResource;
use App\Models\RivojlanishStrategiyasi;
use App\Models\Transformaciya;
use Illuminate\Http\Request;

class TransformaciyaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return TransformaciyaResource::collection(Transformaciya::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TransformaciyaRequest $request)
    {
        $transformatsiya=new Transformaciya();
        $transformatsiya->description=$request->description;
        $imagesName='';
        foreach ($request->images as $image)
        {

            $imgName = $image->getClientOriginalName();
            $image->storeAs('IesAj', $imgName);
            $imagesName = $imagesName . ',' . $imgName;
        }
        $transformatsiya->file=$request->file;
        $transformatsiya->save();
        return new TransformaciyaResource($transformatsiya);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new TransformaciyaResource(Transformaciya::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TransformaciyaRequest $request, $id)
    {
        $transformatsiya=TransformaciyaRequest::find($id);
        $transformatsiya->description=$request->description;
        if ($request->newImages) {
            $imagesName = '';
            foreach ($request->newImages as $image) {

                $imgName = $image->getClientOriginalName();
                $image->storeAs('IesAj', $imgName);
                $imagesName = $imagesName . ',' . $imgName;
            }
        }
        $transformatsiya->file=$request->file;
        $transformatsiya->save();
        return new TransformaciyaResource($transformatsiya);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transformatsiya=TransformaciyaRequest::find($id);
        $transformatsiya->delete();
        return response()->json([
            'status'=>'Success',
            'message'=>'Deleted successfully'
        ]);
    }
}
