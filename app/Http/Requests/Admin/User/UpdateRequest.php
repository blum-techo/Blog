<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'required|string',
            'email'=>'required|string|email|unique:users, email,' . $this->user_id,
            'role'=>'required|integer',
            'user_id'=>'required|integer|exists:users,id',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Необходимо заполнить имя пользователя',
            'emain.required' => 'Необходимо заполнить email',
            'emain.email' => 'Почта должна быть указана в формате имя@сервис.домен',
            'emain.unique:users' => 'Пользователь с таким email уже сущетсвует',

        ];
    }
}
