<?php

namespace Src\Auth\Infrastructure\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class AuthLoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'username' => 'required|string',
            'password' => 'required|string',
        ];
    }
    public function messages(): array
    {
        return [
            'username.required' => 'El campo username es obligatorio.',
            'username.string' => 'El username debe ser una cadena de texto.',
            'password.required' => 'El campo password es obligatorio.',
            'password.string' => 'El password debe ser una cadena de texto.',
        ];
    }

}
