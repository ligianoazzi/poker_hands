<?php 
 namespace App\Traits;

Trait RankRoyalStraightFlush {

    public function isRoyalStraightFlush($array_numbers, $array_naipes){

        $is_card_sequence = sequenceNumber($array_numbers);

        $is_first_10_last_14 = first_10_last_14($array_numbers);

        $is_same_naipe = sameNaipe($array_naipes);

        if(($is_card_sequence == true) && ($is_same_naipe ==true) && ($is_first_10_last_14 ==true)){
            return true;
        }else{
            return false;
        }

    }

}
