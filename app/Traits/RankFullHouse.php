<?php 
namespace App\Traits;

Trait RankFullHouse {

    public function isFullHouse($array_numbers){

        $result = count(array_unique($array_numbers));

        if ($result == 2) { //example (9,9,9,11,11) -> result = (9,11) 2 positions  || (9,9,11,11,11)
            
            $au = array_unique($array_numbers);

            if( ( (!isset($au[1]))&&(!isset($au[2]))&&(!isset($au[4])) ) || ( ( (!isset($au[1]))&&(!isset($au[3]))&&(!isset($au[4])) ) ) ) {
                  // array(2,<2>,<2>,5,<5>);                                     // array(2,<2>,5,<5>,<5>);
                return true;

            } else {

                return false;

            }

        } else {

            return false;

        }

    }



}
