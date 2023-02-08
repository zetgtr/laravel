<?php

declare(strict_types=1);

namespace App\Http\Requests\News;

use App\Enums\NewsStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class CreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'category_ids' => ['required', 'array'],
            'category_ids.*' => ['exists:categories,id'], // проверяет каждый элемент с таблицей categories c полем id
            'title' => ['required', 'min:5', 'max:200'],
            'author' => ['required', 'string', 'min:2', 'max:30'],
            'status' => ['required', new Enum(NewsStatus::class)],
            'img' => ['sometimes'],
            'description' => ['nullable', 'string']
        ];
    }

    public function getCategoriesIds(): array
    {
        return (array) $this->validated('category_ids');
    }

    public function attributes(): array
    {
        return [
            'author' => 'автор',
            'category_ids' => 'категория'
        ];
    }

    public function messages():array
    {
        return [
            'required' => "Нужно заполнить поле :attribute"
        ];
    }
}
