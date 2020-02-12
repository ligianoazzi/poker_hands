<?php

namespace App\Http\Controllers;

use App\Game;
use App\Http\Requests\UserFileStoreRequest;
use App\User;
use Illuminate\Support\Facades\Storage;

class UserFileController extends Controller
{
    /**
     * Store new User file
     *
     * @param UserFileStoreRequest $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function store(UserFileStoreRequest $request, User $user)
    {
        $filename = Storage::disk('user_files')->put('', $request->file('file'));
        $userFile = $user->files()->create([
            'filename' => $filename
        ]);

        $file = Storage::disk('user_files')->get($filename);

        $game = Game::create([
            'file_id' => $userFile->id,
            'user_id' => $user->id
        ]);

        foreach (explode("\n", $file) as $line => $lineValues) {
            if (empty($lineValues)) {
                continue;
            }

            $lineValues = explode(" ", $lineValues);

            if (count($lineValues) != 10) {
                continue;
            }

            $player1Lines = array_slice($lineValues, 0, 5);
            $player2Lines = array_slice($lineValues, 5, 5);

            try {

                        ini_set('max_execution_time', 2400);

                        $game->cards()->create([
                            'line' => $line + 1,
                            'player' => 1,
                            'card_1' => $player1Lines[0],
                            'card_2' => $player1Lines[1],
                            'card_3' => $player1Lines[2],
                            'card_4' => $player1Lines[3],
                            'card_5' => $player1Lines[4],
                        ]);

                        $game->cards()->create([
                            'line' => $line + 1,
                            'player' => 2,
                            'card_1' => $player2Lines[0],
                            'card_2' => $player2Lines[1],
                            'card_3' => $player2Lines[2],
                            'card_4' => $player2Lines[3],
                            'card_5' => $player2Lines[4],
                        ]);

            } catch (Exception $e) {

                echo 'Exception Capturated: ',  $e->getMessage(), "\n";

            }


        }

        return redirect()->route('games.show', ['game' => $game->id]);
        
    }
}
