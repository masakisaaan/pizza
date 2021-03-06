<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminMenuEditForm extends FormRequest
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
            'product_name' => 'required|max:255',
            'product_img' => 'max:1500|mimes:jpg,jpeg',
            'product_text' => 'required',
            'product_price' => 'required|integer',
            'product_genre_id' => 'required',
            'product_sales_start_day' => 'required|date',
            'product_sales_end_day' => 'date',
        ];
    }
}
