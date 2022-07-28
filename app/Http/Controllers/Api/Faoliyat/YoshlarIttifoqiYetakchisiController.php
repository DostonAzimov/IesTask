<?php

namespace App\Http\Controllers\Api\Faoliyat;

use App\Http\Controllers\Controller;
use App\Http\Requests\YoshlarIttifoqiYetakchisiRequest;
use App\Http\Resources\YoshlarIttifoqiYetakchisiResource;
use App\Models\YoshlarIttifoqiYetakchisi;
use Illuminate\Http\Request;

class YoshlarIttifoqiYetakchisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return YoshlarIttifoqiYetakchisiResource::collection(YoshlarIttifoqiYetakchisi::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(YoshlarIttifoqiYetakchisiRequest $request)
    {
        $yiy=new YoshlarIttifoqiYetakchisi();
        $yiy->fullName=$request->fullName;
        $yiy->title=$request->title;
        $yiy->description=$request->description;
        $yiy->phoneNumber=$request->phoneNumber;
        $imageName = $request->image->getClientOriginalName();
        $this->image->storeAs('YIY', $imageName);
        $yiy->image = $imageName;
        $yiy->save();
        return new YoshlarIttifoqiYetakchisiResource($yiy);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new YoshlarIttifoqiYetakchisiResource(YoshlarIttifoqiYetakchisi::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(YoshlarIttifoqiYetakchisiRequest $request, $id)
    {
        $yiy=YoshlarIttifoqiYetakchisi::find($id);
        $yiy->fullName=$request->fullName;
        $yiy->title=$request->title;
        $yiy->description=$request->description;
        $yiy->phoneNumber=$request->phoneNumber;
        if ($this->newImage) {
            unlink('assets/images/foods' . '/' . $yiy->image);
            $imageName = $request->newImage->getClientOriginalName();
            $this->newImage->storeAs('foods', $imageName);
            $yiy->image = $imageName;
        }
        $yiy->image = $imageName;
        $yiy->update();
        return new YoshlarIttifoqiYetakchisiResource($yiy);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $yit=YoshlarIttifoqiYetakchisi::find($id);
        $yit->delete();
        return response()->json([
            'status'=>'Success',
            'message'=>'Deleted successfully'
        ]);
    }
}
