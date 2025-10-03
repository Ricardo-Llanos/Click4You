<?php

namespace App\Helpers;

class DataFormatter
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * El método permite formatear los email a un formato general de "lower_case".
     * 
     * Este formato respeta los acentos (tildes, etc.)
     * 
     * @param string $email - Email sobre el cual realizar el formato
     * @return string - Data Formateada
     */
    public function emailFormat(string $email){
        return $this->lower_case($email);
    }

    /**
     * El método permite formatear a los names a un formato general de "capitalize.
     * 
     * Este formato respeta los acentos de todas las palabras que no sean capitalizadas
     * 
     * @param string $name - Name sobre el cual realizar el formato
     * @return string - Data formateada
     */
    public function nameFormat(string $name){
        return $this->capitalize($name);
    }


    /*================================================
        Definición de Funciones Especiales
    =================================================*/
    private function lower_case(string $word, bool $trim = true){
        if ($trim){
            $word = trim($word);
        }

        $word = mb_strtolower($word);

        return $word;
    }

    private function capitalize(string $word, bool $trim = true){
        if ($trim){
            $word = trim($word);
        }

        $word = ucwords(mb_strtolower($word));

        return $word;
    }
}
