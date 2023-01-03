<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
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
            'name' => 'bail|required|string|unique:items|between:5,30',
            'image' => 'required|file|mimes:jpg,png,jpeg',
            'price' => 'bail|required|integer|gte:1000',
            'description' => 'bail|required|string',
            'location' => 'bail|required|string',
        ];
    }
}
