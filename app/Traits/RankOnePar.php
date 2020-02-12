<?php 
namespace App\Traits;

Trait RankOnePar {

    public function isOnePar($array_numbers) {

        $result = count(array_unique($array_numbers));

        if ($result == 4) {

            return true;

        } else {

            return false;

        }

    }

}
