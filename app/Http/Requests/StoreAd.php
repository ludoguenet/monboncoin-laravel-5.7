<?php

namespace Monboncoin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAd extends FormRequest
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
            'title' => 'required|unique:ads|max:150',
            'description' => 'required',
            'price' => 'required|numeric',
            'localisation' => 'required'
        ];
    }
}
