<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'names' => ['required','string','max:50', 'regex:/^[\pL\s]+$/u'],  //Validamos cualquier letra en cualquier idioma (tildes) y espacios
            'paternal_surname' => ['required','string','max:25', 'regex:/^[\pL]+$/u'],
            'maternal_surname' => ['required', 'string', 'max:25', 'regex:/^[\pL]+$/u'],
            'phone' => ['nullable', 'digits:9', 'unique:users,phone', 'regex:/^9\\d{8}$/'],
        ];
    }

    public function messages(){
        return [
            'names.regex' => 'Los nombres solo deben contener letras',
            'paternal_surname.regex' => 'El apellido paterno solo deben contener letras',
            'maternal_surname.regex' => 'El apellido materno solo deben contener letras',
            'phone.regex' => 'El teléfono debe tener solo 9 caractéres y empezar por 9',
        ];
    }
}
