<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCategoryRequest extends FormRequest
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
            'title' => ['required', 'string', 'min:3', 'max:20'],
            'description' => ['nullable', 'string', 'min:3', 'max:250']
        ];
    }


    public function messages(): array
    {
        // return parent::messages();
        return [
            'required' => 'Вы не заполнили поле :attribute'
        ];
    }

    public function attributes(): array
    {
        // return parent::attributes();
        // Для локального переопределения
        return [
            'title' => 'Наименование',
            'description' => 'Описание'
        ];
    }
}
