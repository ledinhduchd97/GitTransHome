<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddCustomerRequest extends FormRequest
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
            'first_name' => 'required|regex:/^[a-zA-Z ]+$/',
            'last_name' => 'required|regex:/^[a-zA-Z ]+$/',
            'birthday' => 'required',
            'email' => 'required|regex:/^[\w.+\-]+@gmail\.com$/|unique:customers',
            'phone' => 'required|regex:/^[0-9 \(\)-]+$/',
            'address' => 'required'
        ];
    }


}
