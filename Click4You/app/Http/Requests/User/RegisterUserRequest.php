<?php

namespace App\Http\Requests\User;

use App\Http\Requests\User\BaseUser;

use App\Rules\CaseInsensitiveUnique;
use App\Helpers\ArrayRequest;
use Illuminate\Validation\Rules\Password;

class RegisterUserRequest extends BaseUser
{
    /**
     * @var \App\Helpers\ArrayRequests $arrayRequests - Instancia de la clase ArrayRequests
     */
    protected ArrayRequest $arrayRequest;


    public function __construct(
        ArrayRequest $arrayRequest
    ){
        $this->arrayRequest = $arrayRequest;
    }

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
        // Extraemos la información
        $userData = array_merge_recursive($this->userRules(), $this->customRules());
        $userData = $this->arrayRequest
                        ->prefixArray(
                            array: $userData, prefix: $this->userPrefix
                        );

        
        return array_merge_recursive([
            $this->userPrefix => ['required', 'min:1']
        ], $userData);
    }

    public function customRules() : array{
        return [
            'names' => ['required'],
            'paternal_surname' => ['required'],
            'maternal_surname' => ['required'],
            'phone' => ['unique:users,phone'],
            'email' => [new CaseInsensitiveUnique('users', 'email')],
            'password' => ['required', 'string', 'confirmed', 
                            Password::min(8)
                                    ->mixedCase()
                                    ->numbers()
                                    ->symbols()],
            //password_confirmation
        ];
    }

    public function customMessages() : array{
        return [
            // names
            'names.required' => 'El campo nombres es obligatorio.',
            
            // paternal_surname
            'paternal_surname.required' => 'El campo apellido paterno es obligatorio.',

            // maternal_surname
            'maternal_surname.required' => 'El campo apellido materno es obligatorio.',

            // phone
            'phone.unique' => 'El campo teléfono ya se encuentra registrado. Inténtelo nuevamente con otro.',

            // email
                // Se encuentra en la clase CaseInsensitiveUnique

            // password
            'password.required' => 'El campo contraseña es obligatorio.',
            'password.string' => 'El campo contraseña debe ser un string.',
            'password.confirmed' => 'El campo contraseña debe tener una confirmación.',
            // 'password.password' => '',
        ];
    }

    public function messages(){
        $userMessages = $this->arrayRequest
                        ->prefixArray(
                            array: $this->userMessages(), prefix: $this->userPrefix
                        );
        $customMessages = $this->arrayRequest
                        ->prefixArray(
                            array: $this->customMessages(), prefix: $this->userPrefix
                        );
        return array_merge_recursive([
            $this->user.'required' => 'El campo '.$this->user.' es obligatorio.',
            $this->user.'min' => 'El campo '.$this->user.' debe tener al menos 1 registro dentro.',
        ], $userMessages, $customMessages);
    }
}