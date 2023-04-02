<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ProductCatgegoryUpdateRequest extends FormRequest
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
        //|unique:product_categories
        $id = Request::route('category');
        if ($id != 1)
            return [
                'title'         => 'required|min:3|max:200',
                'slug'          => 'max:200|unique:product_categories,slug,'.$id,
                'description'   => 'max:500',
                'parent_id'     => 'required|integer|exists:product_categories,id'
            ];
            
         return [
                'title'         => 'required|min:3|max:200',
                'slug'          => 'max:200|unique:product_categories,slug,'.$id,
                'description'   => 'max:500'
            ];

    }
}
