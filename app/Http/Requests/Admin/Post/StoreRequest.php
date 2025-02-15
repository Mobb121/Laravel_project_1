<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title'=>'required|string',
            'content'=>'required|string',
            'preview_image'=>'required|file',
            'main_image'=>'required|file',
            'category_id'=>'required|integer|exists:categories,id',
            'tag_ids'=>'nullable|array',
            'tag_ids.*'=>'nullable|required|exists:tags,id',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'это поле необходимо для заполнения',
            'title.string' => 'данные должны соответствовать строчному типу',
            'content.required' => 'это поле необходимо для заполнения',
            'content.string' => 'данные должны соответствовать строчному типу',
            'preview_image.required' => 'это поле необходимо для заполнения',
            'preview_image.file' => 'необходимо выбрать файл',
            'main_image.required' => 'это поле необходимо для заполнения',
            'main_image.file' => 'необходимо выбрать файл',
            'category_id.required' => 'это поле необходимо для заполнения',
            'category_id.integer' => 'ID категории должен быть числом',
            'category_id.exists' => 'ID категории должен быть числом',
            'tag_ids.array' => 'необходимо отправить массив данных'
        ];
    }
}
