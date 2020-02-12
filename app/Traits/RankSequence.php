<?php 
namespace App\Traits;

Trait RankSequence {

    public function isSequence($array_numbers, $array_naipes){


        $is_same_naipe = sameNaipe($array_naipes); // needs to be false

        $is_card_sequence = sequenceNumber($array_numbers); // needs to be true

        if( ($is_card_sequence == true) && ($is_same_naipe == false ) ){

            return true;

        } else {

            return false;

        }

    }    


}
