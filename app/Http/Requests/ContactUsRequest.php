<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactUsRequest extends FormRequest
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
            'address'=>'required|string|max:255',
            'metro'=>'required|string|max:255',
            'bus'=>'required|string|max:255',
            'phoneNumber'=>'required|numeric',
            'webSayt'=>'required|string|max:255',
            'email'=>'required|email',
            'e-xat'=>'required|string|max:255',
            'wordDate'=>'required|string|max:255'
        ];
    }
}
