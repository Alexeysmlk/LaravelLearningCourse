<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCallbackRequest extends FormRequest
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
            'title' => 'string | required | min:5 | max:65 ',
            'text' => 'string | min:10 | max:255',
        ];
    }

    public function messages()
    {
        return [
            'title.string' => 'Данное поле должно содержать буквы или цифры',
            'title.required' => 'Данное поле обязательное для заполнения',
            'title.min' => 'Заголовок обращения должен содержать не менее :min символов',
            'title.max' => 'Заголовок обращения должен содержать не больше :max символов',

            'text.string' => 'Данное поле может содержать только буквы или цифры',
            'text.min' => 'Текст обращения должен содержать не менее :min символов',
            'text.max' => 'Текст обращения должен содержать не больше :max символов',
        ];
    }
}
