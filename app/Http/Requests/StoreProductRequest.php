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
            'name' => 'string | required | min:4 | max:255 | unique:products,name',
            'price'=> 'numeric | required',
            'img' => 'image',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Поле name является обязательным',
            'name.string' => 'Поле name должно содержать только буквы и цифры',
            'name.min' => 'Поле name не должно содержать меньше :min символов!',
            'name.max' => 'Поле name не должно содержать больше :max символов',
            'name.unique' => 'Такое имя уже используется',

            'price.numeric' => 'Цена должна содержать только цифры',
            'price.required' => 'Поле price обязательное'

        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'status' => filter_var($this->status, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE)
        ]);
    }
}
