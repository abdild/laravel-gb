<?php
// Такие request нужно делать на каждую форму

namespace App\Http\Requests\News;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true; // В случае когда нужно разграничить права доступа, то нужно ставить false и прописывать правила доступа
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'categories_id' => ['required', 'integer', 'min:1', 'exists:categories,id'],
            'title' => ['required', 'string', 'min:5', 'max:250'],
            'author' => ['required', 'string', 'min:2', 'max:50'],
            'image' => ['nullable', 'image', 'mimes:png,jpg,jpeg'],
            'status' => ['required', 'string', 'min:5', 'max:7'],
            'description' => ['nullable', 'string'],
            'only_admin' => ['nullable', 'boolean']
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
            'author' => 'Автор'
        ];
    }
}
