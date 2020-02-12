<?php 
namespace App\Traits;

Trait RankCheckWinner {

    function checkWinner($p1, $p2, $typeCardTesting){

        if ( ($p1 == true) && ($p2 == false) ){

            $_SESSION["P1Win"]++;

            return "P1 Win (".$typeCardTesting.")";

        } else if ( ($p1 == false) && ($p2 == true) ){

            return "P2 Win (".$typeCardTesting.")";

        } else {

            return null;

        }

    }

}
