<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ProductUpdateRequest extends FormRequest
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
        $id = Request::route('product');

        return  [
            'title'         => 'required|min:3|max:200',
            'slug'          => 'max:200|unique:products,slug,'.$id,
            'description'   => 'max:500',
            'category_id'   => 'required|integer|exists:product_categories,id',
            'vendor_code'   => 'required|unique:products,vendor_code,'.$id,
            'price'         => 'numeric|required'
        ];
    }
}
