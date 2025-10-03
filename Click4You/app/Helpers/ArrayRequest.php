<?php
namespace App\Helpers;

class ArrayRequest {
    public function __construct(){

    }

    /**
     * @param array $array
     * @param string $prefix
     * @return array
     */
    public function prefixArray(array $array, string $prefix, string $separator='.') : array
    {
        $newArray = array();

        foreach($array as $field=>&$value){
            $newArray[$prefix.$separator.$field] = $value;
        }

        return $newArray;
    }
}
?>