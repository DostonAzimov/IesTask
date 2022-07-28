<?php

namespace App\Http\Controllers\Api\JamiyatHaqida;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactUsRequest;
use App\Http\Resources\ContactUsResource;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return ContactUsResource::collection(ContactUs::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactUsRequest $request)
    {
        return  new ContactUsResource(ContactUs::create($request->validated()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return  new ContactUsResource(ContactUs::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ContactUsRequest $request, $id)
    {
        $contact_us=ContactUs::find($id);
        $contact_us->update($request->validated());
        return  new ContactUsResource($contact_us);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact_us=ContactUs::find($id);
        $contact_us->delete();
        return response()->json([
            'status'=>'Success',
            'message'=>'Deleted successfully'
        ]);
    }
}
