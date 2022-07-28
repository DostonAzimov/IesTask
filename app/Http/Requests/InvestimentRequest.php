<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvestimentRequest extends FormRequest
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
            'project'=>'required|string|max:255',
            'value'=>'required|numeric',
            'involvedInvestment'=>'required|email',
            'date'=>'required|string|max:255',
            'power'=>'required|string|max:255',
            'result'=>'required|string|max:255',
        ];
    }
}
