<?php 
namespace App\Traits;

Trait RankStraightFlush {

    public function isStraightFlush($array_numbers, $array_naipes){

        $is_card_sequence = sequenceNumber($array_numbers);

        $is_same_naipe = sameNaipe($array_naipes);

        if( ($is_card_sequence == true) && ($is_same_naipe == true) ){

            return true;

        }else{

            return false;            

        }

    }
}
