<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateHouseRequest extends FormRequest
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
            'name' => 'required|max:100',
            'code' => 'required|max:10',
            'note' => 'max:250',
            'phone' => 'required|max:13|regex:/^[0-9 \(\)-]+$/',
            'address' => 'required|max:250',
            'area' => 'required',
            'number_bedroom' => 'required|numeric',
            'number_bathroom' => 'required|numeric',
            'site_area' => 'required|numeric',
            'area_gross_floor' => 'required|numeric',
            'price' => 'required|numeric',
            'unit' => 'required',
            'video' => 'required',
            'description' => 'max:250',
            'brokerage' => 'required|max:100',
            'agent' => 'required|max:100',
            'license' => 'required',
            'mls' => 'required|max:25',
            'zipcode' => 'required|max:10',
            'builded_year' => 'required|numeric',
        ];
    }
}
