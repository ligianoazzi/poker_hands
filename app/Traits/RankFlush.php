<?php 
namespace App\Traits;

Trait RankFlush {

    public function isFlush($array_numbers, $array_naipes){

        $is_same_naipe = sameNaipe($array_naipes);

        $is_card_sequence = sequenceNumber($array_numbers);

        if ( ($is_card_sequence == false) && ($is_same_naipe == true ) ) {

            return true;

        } else {

            return false;            

        }

    }

}
