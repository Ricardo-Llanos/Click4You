<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

abstract class BaseUser extends FormRequest
{

    protected string $userPrefix = 'user_data';
    protected string $user = 'user_data.';


    public function __construct(){

    }
    
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * El método determina el conjunto de reglas que necesita un "User".
     * 
     * El método busca poder ser reutilizado por los hijos, por lo que no contiene lógica que pueda interferir con futuras ramificaciones.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function userRules(): array
    {
        return [
            'names' => ['string','max:50', 'regex:/^[\pL\s]+$/u'],  //Validamos cualquier letra en cualquier idioma (tildes) y espacios
            'paternal_surname' => ['string','max:25', 'regex:/^[\pL\s]+$/u'],
            'maternal_surname' => ['string', 'max:25', 'regex:/^[\pL\s]+$/u'],
            'phone' => ['digits:9', 'regex:/^9\d{8}$/'],
            'email' => ['email', 'max:100'],
        ];
    }

    /**
     * El método determina el conjunto de reglas que personalizadas que podemos extender en la clase Hija en caso lo necesitemos.
     * 
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    abstract function customRules() : array;

    /**
     * El método genera un conjunto de mensajes personalizados para las reglas determinadas en el "userRules".
     * 
     * El método busca poder ser reutilizado por los hijos, para que puedan acceder a los mensajes personalizados para los userRules.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    protected function userMessages() : array
    {
        return [
            // names
            'names.string' => 'El campo nombres debe ser un string.',
            'names.max' => 'El campo nombres debe tener una amplitud máxima de 50.',
            'names.regex' => 'El campo nombres solo debe contener letras.',

            // paternal_surname
            'paternal_surname.string' => 'El campo apellido paterno debe ser un string.',
            'paternal_surname.max' => 'El campo apellido paterno debe tener una amplitud máxima de 50.',
            'paternal_surname.regex' => 'El apellido paterno solo deben contener letras.',

            // maternal_surname
            'maternal_surname.string' => 'El campo apellido materno debe ser un string.',
            'maternal_surname.max' => 'El campo apellido materno debe tener una amplitud máxima de 50.',
            'maternal_surname.regex' => 'El apellido materno solo deben contener letras.',

            // phone
            'phone.digits' => 'El campo teléfono debe tener 9 caractéres numéricos.',
            'phone.regex' => 'El teléfono debe tener solo 9 caractéres numéricos y empezar por 9.',

            // email
            'email.email' => 'El campo email no cuenta con el formato correspondiente.',
            'email.max' => 'El campos email debe tener una amplitud máxima de 100.',
        ];
    }
    
    /**
     * El método determina el conjunto de mensajes que personalizadas que podemos extender en la clase Hija para las customRules.
     * 
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    abstract function customMessages() : array;
}
