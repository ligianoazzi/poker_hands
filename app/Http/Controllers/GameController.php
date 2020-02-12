<?php
// Storing session data

namespace App\Http\Controllers;

use App\Game;
use App\GameCard;
use App\UserFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Traits\Rank;

$_SESSION["P1Win"] = 0;

class MyTraitsRank {
    use Rank;
}


class GameController extends Controller
{
    use Rank;

    /**
     * Show game details
     *
     * @param Game $game
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Game $game, GameCard $GameCard)
    {
        return view('gameShow', [
            'game' => $game,
            'gameController' => $this,
        ]);
    }

    /**
     * Delete Game
     *
     * @param Game $game
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Game $game)
    {
        $userFile = UserFile::where('id', $game->file_id)->first();

        Storage::disk('user_files')->delete($userFile->getOriginal('filename'));

        $game->delete();

        return redirect()->route('home');
    }

    /**
     * Check Winner
     *
     * @param $Player1, $Player2
     * @return winner
     * @throws \Exception
     */      
    public function checkWinner($Player1, $Player2){

        // preparing parameters
        $array_numbers_p1 = changeStringPerArray( "number", explode(",", $Player1) ); // return 
        $array_numbers_p2 = changeStringPerArray( "number", explode(",", $Player2) );

         $array_naipes_p1 = changeStringPerArray( "naipe", explode(",", $Player1) ); 
         $array_naipes_p2 = changeStringPerArray( "naipe", explode(",", $Player2) );

        $array_numbers_p1 = changeStringPerNumber( $array_numbers_p1 ); // change A per (14), K per (13), Q per (12), J per (11)   
        $array_numbers_p2 = changeStringPerNumber( $array_numbers_p2 );    


        // cheking winner, considering each type of ranking, using cards of two players 
		$rank = new MyTraitsRank();

		$typeRanks = array("isRoyalStraightFlush", "isStraightFlush", "isQuadra", "isFullHouse", "isFlush", "isSequence", "isTrinca", "isTwoPar", "isOnePar");

		// 9 types of rank running on this foreach
		foreach ($typeRanks as $typeRank) {

	        $p1Rank = $rank->$typeRank($array_numbers_p1, $array_naipes_p1);
	        $p2Rank = $rank->$typeRank($array_numbers_p2, $array_naipes_p2);
	        
	        $checkRank = $rank->CheckWinner($p1Rank, $p2Rank, $typeRank);

	        if( $checkRank != null ){ return $checkRank; }

		}

		// last 1 type of rank
		$checkRank = $rank->high_card($array_numbers_p1, $array_numbers_p2);

        if ($checkRank == "P1 Win (High Card)"){$_SESSION["P1Win"]++;}        

		return $checkRank;

	}    

}