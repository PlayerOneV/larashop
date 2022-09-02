<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => ['required', 'max:255'],
            'description' => ['required', 'max:1000'],
            'price' => ['required', 'min:1'],
            'stock' => ['required', 'min:0'],
            'status' => ['required', 'boolean'],
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            //El producto no debe estar disponible si tiene stock 0
            if ($this->status && $this->stock == 0) {
                $validator->errors()->add('stock', 'If the product is available must have stock');
            }
        });
    }
}
