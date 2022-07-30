<?php

namespace App\Http\Controllers\Api\KorporativBoshqaruv;

use App\Http\Controllers\Controller;
use App\Http\Requests\SupervisoryBoardRequest;
use App\Http\Resources\SupervisoryBoardResource;
use App\Models\SupervisoryBoard;
use Illuminate\Http\Request;

class SupervisoryBoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return SupervisoryBoardResource::collection(SupervisoryBoard::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SupervisoryBoardRequest $request)
    {
        return new SupervisoryBoardResource(SupervisoryBoard::create($request->validated()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new SupervisoryBoardResource(SupervisoryBoard::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SupervisoryBoardRequest $request, $id)
    {
        $supB=SupervisoryBoard::find($id);
        $supB->update($request->validated());
        return new SupervisoryBoardResource($supB);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supB=SupervisoryBoard::find($id);
        $supB->delete();
        return response()->json([
            'status'=>'Success',
            'message'=>'Deleted successfully'
        ]);
    }
}
