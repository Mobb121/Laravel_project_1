<?php

namespace App\Http\Requests\Admin\User;

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
            'name'=>'required|string',
            'email'=>'required|string|email',
            'password'=>'required|string'
        ];
    }
    public function messages()
    {
        return [
            'name.string'=>'это поле должно иметь строковый формат',
            'name.required'=>'это поле обязательно для заполнения',
            'email.string'=>'это поле должно иметь строковый формат',
            'email.required'=>'это поле обязательно для заполнения',
            'email.email'=>'ваша почта должна соответствовать формату name@mail.com',
            'email.unique'=>'это значение должно быть уникальным',
            'password.string'=>'это поле должно иметь строковый формат',
            'password.required'=>'это поле обязательно для заполнения',
        ];
    }
}
