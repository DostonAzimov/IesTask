<?php

namespace App\Http\Controllers\Api\JamiyatHaqida;

use App\Http\Controllers\Controller;
use App\Http\Requests\IesAjRequest;
use App\Http\Resources\IesAjResource;
use App\Models\HomeSlider;
use App\Models\IesAj;
use Illuminate\Http\Request;

class IesAjController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  IesAjResource::collection(IesAj::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $iesAj=new IesAj();
        $iesAj->description=$request->description;
            $imagesName='';
            foreach ($request->images as $image)
            {

                $imgName = $image->getClientOriginalName();
                $image->storeAs('IesAj', $imgName);
                $imagesName = $imagesName . ',' . $imgName;
            }
            $iesAj->save();
        return new IesAjResource($iesAj);
        }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new IesAjResource(IesAj::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(IesAjRequest $request, $id)
    {
        $iesAj=IesAj::find($id);
        $iesAj->description=$request->description;
        if ($request->newImages) {
            $imagesName = '';
            foreach ($request->newImages as $image) {

                $imgName = $image->getClientOriginalName();
                $image->storeAs('IesAj', $imgName);
                $imagesName = $imagesName . ',' . $imgName;
            }
        }
        $iesAj->save();
        return new IesAjResource($iesAj);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $iesAj=IesAj::find($id);
        $iesAj->delete();
        return response()->json([
            'status'=>'Success',
            'message'=>'Deleted successfully'
        ]);
    }
}
