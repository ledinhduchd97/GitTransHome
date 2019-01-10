<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditCustomerRequest extends FormRequest
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
            'first_name' => 'required|max:65|regex:/^[a-zA-Z ]+$/',
            'last_name' => 'required|max:65|regex:/^[a-zA-Z ]+$/',
            'birthday' => 'required',
            'email' => 'required|regex:/^[\w.+\-]+@gmail\.com$/',
            'phone' => 'required|min:10|max:15|regex:/^[0-9 \(\)-]+$/',
            'address' => 'required|max:255',
            'type' => 'max:255'
        ];
    }
}
