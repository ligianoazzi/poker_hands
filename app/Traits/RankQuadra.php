<?php 
namespace App\Traits;

Trait RankQuadra {

    public function isQuadra($array_numbers){

        $result = count(array_unique($array_numbers));

        if($result == 2){ //example (9,9,9,9,11) -> reeult = (9,11) 2 positions
            
            $array_2_positions = array_unique($array_numbers);

            if( ( isset($array_2_positions[4]) ) || ( isset($array_2_positions[1]) ) ){
                  // array(2,2,2,2,->5<-);          // array(->2<-,5,5,5,5);
                return true;

            }else{

                return false;
            }

        }else{

            return false;

        }

    }


}
