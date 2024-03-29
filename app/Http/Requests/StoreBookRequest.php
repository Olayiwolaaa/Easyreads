<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
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
            'title'             => 'required|unique:books,title',
            'slug'              => 'required|unique:books,slug',
            'description'       => 'required',
            'init_price'        => 'required|numeric',
            'discount_price'    => 'digits_between:0,100',
            'cover_image'       => 'required|max:1000|mimes:png,jpg',
        ];
    }
}
