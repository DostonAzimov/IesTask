<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VertualRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'fullName'=>'required|string|max:255',
            'dateOfBirth'=>'required|string|max:255',
            'passport'=>'required',
            'region'=>'required|string|max:255',
            'district'=>'required|string|max:255',
            'address'=>'required|string|max:255',
            'email'=>'required|email',
            'secret'=>'required',
            'phoneNumber'=>'required|numeric',
        ];
    }
}
