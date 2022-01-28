<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
        $category_id = $this->category->id;
        return [
            'name'  => 'required|unique:categories,name,'.$category_id,
            'slug'  => 'required|unique:categories,slug,'.$category_id,
        ];
    }
}
