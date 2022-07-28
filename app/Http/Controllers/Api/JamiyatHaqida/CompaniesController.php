<?php

namespace App\Http\Controllers\Api\JamiyatHaqida;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompaniesRequest;
use App\Http\Resources\CompaniesResource;
use App\Models\Companies;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return CompaniesResource::collection(Companies::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompaniesRequest $request)
    {
        return new CompaniesResource(Companies::create($request->validated()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new CompaniesResource(Companies::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompaniesRequest $request, $id)
    {
        $company=Companies::find($id);
        $company->update($request->validated());
        return new CompaniesResource($company);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company=Companies::find($id);
        $company->delete();
        return response()->json([
            'status'=>'Success',
            'message'=>'Deleted successfully'
        ]);
    }
}
