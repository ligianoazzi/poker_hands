<?php 
namespace App\Traits;

Trait RankHighCard {

    public function high_card($array_numbers_p1, $array_numbers_p2) {

        $max_p1 = max($array_numbers_p1);

        $max_p2 = max($array_numbers_p2);

        if ($max_p1 > $max_p2) {

            return "P1 Win (High Card)";

        } else if ($max_p1 < $max_p2) {

            return "P2 Win (High Card)";

        } else {

            return "Tie in play";

        }

    }

}
