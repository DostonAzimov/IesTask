<?php

namespace App\Http\Controllers\Api\InvestitsiyaSiyosati;

use App\Http\Controllers\Controller;
use App\Http\Requests\InvestimentRequest;
use App\Http\Resources\InvestimentResource;
use App\Models\Investments;
use Illuminate\Http\Request;

class InvestmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return InvestimentResource::collection(Investments::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InvestimentRequest $request)
    {
        return new InvestimentResource(Investments::create($request->validated()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new InvestimentResource(Investments::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(InvestimentRequest $request, $id)
    {
        $inv=Investments::find($id);
        $inv->update($request->validated());
        return new InvestimentResource($inv);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $inv=Investments::find($id);
        $inv->delete();
        return response()->json([
            'status'=>'Success',
            'message'=>'Deleted successfully'
        ]);
    }
}
