<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
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
        $book_id = $this->book->id;
        return [
            'title'             => 'required|unique:books,title,'.$book_id,
            'slug'              => 'required|unique:books,slug,'.$book_id,
            'description'       => 'required',
            'init_price'        => 'required|numeric',
            'discount_price'    => 'digits_between:0,100',
            'cover_image'       => 'sometimes|max:1000|mimes:png,jpg',
        ];
    }
}
