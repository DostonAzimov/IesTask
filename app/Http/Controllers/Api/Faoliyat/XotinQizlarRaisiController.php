<?php

namespace App\Http\Controllers\Api\Faoliyat;

use App\Http\Controllers\Controller;
use App\Http\Requests\XotinQizlarRaisiRequest;
use App\Http\Resources\XotinQizlarRaisiResource;
use App\Http\Resources\YoshlarIttifoqiYetakchisiResource;
use App\Models\XotinQizlarRaisi;
use App\Models\YoshlarIttifoqiYetakchisi;
use Illuminate\Http\Request;

class XotinQizlarRaisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return XotinQizlarRaisiResource::collection(XotinQizlarRaisi::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(XotinQizlarRaisiRequest $request)
    {
        $xqr=new XotinQizlarRaisi();
        $xqr->fullName=$request->fullName;
        $xqr->title=$request->title;
        $xqr->description=$request->description;
        $xqr->phoneNumber=$request->phoneNumber;
        $imageName = $request->image->getClientOriginalName();
        $this->image->storeAs('XQR', $imageName);
        $xqr->image = $imageName;
        $xqr->save();
        return new XotinQizlarRaisiResource($xqr);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new XotinQizlarRaisiResource(XotinQizlarRaisi::find($id));
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
        $xqr=XotinQizlarRaisi::find($id);
        $xqr->fullName=$request->fullName;
        $xqr->title=$request->title;
        $xqr->description=$request->description;
        $xqr->phoneNumber=$request->phoneNumber;
        if ($this->newImage) {
            $imageName = $request->newImage->getClientOriginalName();
            $this->newImage->storeAs('foods', $imageName);
            $xqr->image = $imageName;
        }
        $xqr->image = $imageName;
        $xqr->update();
        return new YoshlarIttifoqiYetakchisiResource($xqr);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $xqr=XotinQizlarRaisi::find($id);
        $xqr->delete();
        return response()->json([
            'status'=>'Success',
            'message'=>'Deleted successfully'
        ]);
    }
}
