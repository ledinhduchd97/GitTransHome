<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HouseStoreRequest extends FormRequest
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
            'name' => 'required|max:100|regex:/^[a-zA-Z0-9]+$/',
            'code' => 'required',
            'address' => 'required|max:250',
            'number_bedroom' => 'required|numeric',
            'number_bathroom' => 'required|numeric',
            'area_gross_floor' => 'required|numeric',
            'site_area' => 'required|numeric',
            'price' => 'required|numeric',
            'unit' => 'required|numeric',
            'brokerage' => 'required|max:100|regex:/^[a-zA-Z0-9]+$/',
            'agent' => 'required|max:100|regex:/^[a-zA-Z0-9]+$/',
            'license' => 'required',
            'mls' => 'required|max:25',
            'zipcode' => 'required|numeric|max:999999999',
            'builded_year' => 'required|numeric|max:9999',
            'note' => 'required|max:250|regex:/^[a-zA-Z0-9]+$/',
            'phone' => 'required|regex:/^[0-9 \(\)-]+$/'
        ];
    }
}
