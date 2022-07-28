<?php

namespace App\Http\Controllers\Api\KorporativBoshqaruv;

use App\Http\Controllers\Controller;
use App\Http\Requests\UstavRequest;
use App\Http\Resources\UstavResource;
use App\Models\Ustav;
use Illuminate\Http\Request;

class UstavController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return UstavResource::collection(Ustav::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UstavRequest $request)
    {
        $ustav=new Ustav();
        $file = $request->file->getClientOriginalName();
        $this->file->storeAs('Ustav', $file);
        $ustav->file=$file;
        return new UstavResource($ustav);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new UstavResource(Ustav::find($id));
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
        $ustav=Ustav::find($id);
        if ($request->newFile)
        {
            $newFile = $request->newFile->getClientOriginalName();
            $this->newFile->storeAs('Ustav', $newFile);
            $ustav->file=$newFile;
        }
        $ustav->update();
        return new UstavResource($ustav);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ustav=Ustav::find($id);
        $ustav->delete();
        return response()->json([
            'status'=>'Success',
            'message'=>'Deleted successfully'
        ]);
    }
}
