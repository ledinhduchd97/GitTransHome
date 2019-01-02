<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditSetUpsTableRequest extends FormRequest
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
            'website_name' => 'required|max:63',
            'description' => 'max:250',
            'thank_you' => 'required',
            'phone' => 'required|regex:/^[0-9 \(\)-]+$/',
            'email' => 'required|regex:/^[\w.+\-]+@gmail\.com$/|max:100',
            'address' => 'required|max:250',
            'facebook' => 'required',
            'instagram' => 'required',
            'twitter' => 'required'
        ];
    }
}
