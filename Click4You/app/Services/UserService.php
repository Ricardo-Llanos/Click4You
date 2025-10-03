<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use App\Helpers\DataFormatter;

class UserService
{
    protected DataFormatter $dataFormatter;

    protected array $userFields;

    /**
     * Create a new class instance.
     */
    public function __construct(
        DataFormatter $dataFormatter
    )
    {
        $this->dataFormatter = $dataFormatter;
        $this->userFields = [ // Definimos la información de los usuarios
            'names' => ['names', 'paternal_surname', 'maternal_surname'],
            'email' => ['email']
        ];
    }

    /**
     * 
     * @param ?string $id - Identificador único del usuario a buscar
     */
    public function showUser(?string $id = null) {
        if ($id){
            return User::findOrFail($id);
        }else{
            return User::all();
        }
    }

    /**
     * 
     * @param array $userData - Información del usuario a crear
     * @return \App\Models\User
     */
    public function storeUser(array $userData) {
        return DB::transaction(function() use($userData){
            $userData = $this->formatUser($userData);
            $password = Hash::make($userData['password']);
            $userData['password'] = $password;

            return User::create($userData);
        });
    }

    /**
     * 
     * @param array $userData - Información del usuario a editar
     * @param string $id - Identificador único del usuario a editar
     */
    public function updateUser(array $userData, string $id){
        $user = User::findOrFail($id);

        $userData = $this->formatUser($userData);

        $user->update($userData);

        return $user;
    }

    /**
     * 
     * @param string $id - Identificador único del usuario a eliminar
     * @return void
     */
    public function destroyUser(string $id) : void{
        $user = User::findOrFail($id);
        $user->delete();
    }



    /*==================================
        Funciones Especiales
    ====================================*/
    private function formatUser(array $data){
        foreach($data as $field=>&$value){
            foreach($this->userFields as $userField=>&$userValue){
                if (in_array($field, $userValue)){
                    
                    //$userData[$field]
                    $value = match($userField){
                        'names' => $this->dataFormatter->nameFormat($data[$field]),
                        'email' => $this->dataFormatter->emailFormat($data[$field]),
                    };
                }
            }
        }
        return $data;
    }
}
