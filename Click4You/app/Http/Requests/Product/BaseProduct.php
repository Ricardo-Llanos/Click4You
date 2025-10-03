<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

abstract class BaseProduct extends FormRequest
{

    protected string $productPrefix = 'product_data';

    protected string $fileProductPrefix = 'file_product_data';



    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * El método determina el conjunto de reglas que necesita un "User".
     * 
     * El método busca poder ser reutilizado por los hijos, por lo que no contiene lógica que pueda interferir con futuras ramificaciones.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function productRules(): array
    {
        return [
            'names' => ['string','max:100', 'regex:/^[\pL\s\d\-\/]+$/u'],  //Validamos cualquier letra en cualquier idioma (tildes) y espacios, números, guiones y barras
            'description' => ['string'],
            'price' => ['numeric', 'min:0'], //$table->decimal('price', 8, 2); // 100000,02
            'brand' => ['string','max:50', 'regex:/^[\pL\s]+$/u'],
            'quantity' => ['min:0', 'integer'], // integer
            'is_active' => ['boolean'], // boolean
            'categorie_id' => ['integer', 'exists:categories,id'], // FK
        ];
    }

    /**
     * El método determina el conjunto de reglas que necesita un "User".
     * 
     * El método busca poder ser reutilizado por los hijos, por lo que no contiene lógica que pueda interferir con futuras ramificaciones.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function fileProductRules(): array
    {
        return [
            'filename' => ['string', 'max:100'],
            'size' => ['integer', 'min:0'], // BigInteger
            'type' => ['string','max:20'],
            'image_file' => ['image', 'max:2048', 'mimes:jpeg,png,webp'],
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
    protected function productMessages() : array
    {
        return [
            // names
            // 'names.string' => 'El campo nombres debe ser un string.',
            // 'names.max' => 'El campo nombres debe tener una amplitud máxima de 50.',
            // 'names.regex' => 'El campo nombres solo debe contener letras.',

            // // paternal_surname
            // 'paternal_surname.string' => 'El campo apellido paterno debe ser un string.',
            // 'paternal_surname.max' => 'El campo apellido paterno debe tener una amplitud máxima de 50.',
            // 'paternal_surname.regex' => 'El apellido paterno solo deben contener letras.',

            // // maternal_surname
            // 'maternal_surname.string' => 'El campo apellido materno debe ser un string.',
            // 'maternal_surname.max' => 'El campo apellido materno debe tener una amplitud máxima de 50.',
            // 'maternal_surname.regex' => 'El apellido materno solo deben contener letras.',

            // // phone
            // 'phone.digits' => 'El campo teléfono debe tener 9 caractéres numéricos.',
            // 'phone.regex' => 'El teléfono debe tener solo 9 caractéres numéricos y empezar por 9.',

            // // email
            // 'email.email' => 'El campo email no cuenta con el formato correspondiente.',
            // 'email.max' => 'El campos email debe tener una amplitud máxima de 100.',
        ];
    }
    
    /**
     * El método determina el conjunto de mensajes que personalizadas que podemos extender en la clase Hija para las customRules.
     * 
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    abstract function customMessages() : array;
}
