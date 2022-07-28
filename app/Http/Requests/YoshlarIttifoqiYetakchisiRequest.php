<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class YoshlarIttifoqiYetakchisiRequest extends FormRequest
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
            'title'=>'required|string|max:255',
            'fullName'=>'required|string|max:255',
            'phoneNumber'=>'required|numeric',
            'email'=>'required|email',
            'description'=>'required|string|max:255',
        ];
    }
}
