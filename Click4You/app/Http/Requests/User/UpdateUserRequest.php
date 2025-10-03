<?php

namespace App\Http\Requests\User;

use App\Http\Requests\User\BaseUser;

use App\Helpers\ArrayRequest;
use App\Rules\CaseInsensitiveUnique;

class UpdateUserRequest extends BaseUser
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
        // Extraemos el id de la ruta
        $id = $this->route('id');
        
        // Extraemos la data
        $userData = $this->arrayRequest
                    ->prefixArray(
                            array: $this->userRules(), prefix: $this->userPrefix
                    );

        $customData = $this->arrayRequest
                    ->prefixArray(
                            array: $this->customRules($id), prefix: $this->userPrefix
                    );
        
        return array_merge_recursive([
            $this->userPrefix => ['required', 'min:1']
        ], $userData, $customData);
    }

    public function customRules(?string $id = null): array
    {
        return [
            'phone' => ['unique:users,phone,' . $id],
            'email' => [(new CaseInsensitiveUnique('users', 'email'))->ignore($id)],
        ];
    }

    public function customMessages(): array
    {
        return [
            'phone.unique' => 'El campo teléfono ya se encuentra registrado. Inténtelo nuevamente con otro.',
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
