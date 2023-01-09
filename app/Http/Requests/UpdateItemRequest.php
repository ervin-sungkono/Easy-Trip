<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateItemRequest extends FormRequest
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
            'name' => 'bail|required|string|unique:items,name,'.$this->id.'|between:5,30',
            'price' => 'bail|required|integer|gte:1000',
            'description' => 'bail|required|string',
            'location' => 'bail|required|string',
        ];
    }
}
