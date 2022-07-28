<?php

namespace App\Http\Controllers\Api\JamiyatHaqida;

use App\Http\Controllers\Controller;
use App\Http\Requests\RivStrategiyasiRequest;
use App\Http\Resources\IesAjResource;
use App\Http\Resources\RivStrategiyasiResource;
use App\Models\IesAj;
use App\Models\RivojlanishStrategiyasi;
use Illuminate\Http\Request;

class RivStrategiyasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return RivStrategiyasiResource::collection(RivojlanishStrategiyasi::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RivStrategiyasiRequest $request)
    {
        $rivStr=new RivojlanishStrategiyasi();
        $rivStr->description=$request->description;
        $imagesName='';
        foreach ($request->images as $image)
        {

            $imgName = $image->getClientOriginalName();
            $image->storeAs('IesAj', $imgName);
            $imagesName = $imagesName . ',' . $imgName;
        }
        $rivStr->file=$request->file;
        $rivStr->save();
        return new IesAjResource($rivStr);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new RivStrategiyasiResource(RivojlanishStrategiyasi::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RivStrategiyasiRequest $request, $id)
    {
        $rivStr=RivojlanishStrategiyasi::find($id);
        $rivStr->description=$request->description;
        if ($request->newImages) {
            $imagesName = '';
            foreach ($request->newImages as $image) {

                $imgName = $image->getClientOriginalName();
                $image->storeAs('IesAj', $imgName);
                $imagesName = $imagesName . ',' . $imgName;
            }
        }
        $rivStr->file=$request->file;
        $rivStr->save();
        return new IesAjResource($rivStr);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rivStr=RivojlanishStrategiyasi::find($id);
        $rivStr->delete();
        return response()->json([
            'status'=>'Success',
            'message'=>'Deleted successfully'
        ]);
    }
}
